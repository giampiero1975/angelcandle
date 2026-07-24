<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candle;
use Illuminate\Http\Request;

class CandleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candles = Candle::whereNull('deleted_at')->get();
        return view('admin.candles.index', compact('candles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // ... altre validazioni ...
            'immagine' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // valida l'immagine
        ]);

        $candle = new Candle;
        $candle->name = $request->input('name');
        $candle->description = $request->input('description');
        $candle->price = $request->input('price');

        if ($request->hasFile('image')) {
            $immagine = $request->file('image');
            $nomeImmagine = time() . '_' . $immagine->getClientOriginalName();
            #$immagine->move(public_path('images'), $nomeImmagine);
            $immagine->move(storage_path('app/public/images'), $nomeImmagine);
            $candle->image = 'images/' . $nomeImmagine;
        }

        $candle->save();

        return redirect()->route('admin.candles.index')->with('success', 'Candela creata con successo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candle $candle)
    {
        dd($candle);
        return view('admin.candles.edit', compact('candle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candle $candle)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $candle->name = $request->name;
        $candle->description = $request->description;
        $candle->price = $request->price;

        if ($request->hasFile('image')) {
            try {
                $immagine = $request->file('image');
                $nomeImmagine = time() . '_' . $immagine->getClientOriginalName();
                #$immagine->move(public_path('images'), $nomeImmagine);
                $immagine->move(storage_path('app/public/images'), $nomeImmagine);
                $candle->image = 'images/' . $nomeImmagine; // usa 'image' invece di 'immagine'
            } catch (\Exception $e) {
                // Gestisci l'errore, ad esempio:
                return redirect()->back()->withErrors(['immagine' => 'Errore durante il caricamento dell\'immagine: ' . $e->getMessage()]);
            }
        }

        $candle->save();

        return redirect()->route('admin.candles.index')->with('success', 'Candela aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candle $candle)
    {
        $candle->delete(); // Ora effettua una cancellazione logica
        return redirect()->route('admin.candles.index')->with('success', 'Candela eliminata con successo.');
    }
}
