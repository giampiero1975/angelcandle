<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candle;
use App\Models\Customization;
use Illuminate\Http\Request;

class CustomizationController extends Controller
{
    public function index()
    {
        $customizations = Customization::with('candle')->get(); // Carica la relazione candle
        return view('admin.customizations.index', compact('customizations'));
    }
    
    public function create()
    {
        $candles = Candle::all();
        return view('admin.customizations.create', compact('candles'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'candle_id' => 'required|exists:candles,id',
            'name' => 'required',
            'value' => 'required',
            'additional_price' => 'required|numeric',
        ]);
        
        Customization::create($request->all());
        
        return redirect()->route('admin.customizations.index')->with('success', 'Personalizzazione creata con successo.');
    }
    
    public function edit(Customization $customization)
    {
        $candles = Candle::all();
        return view('admin.customizations.edit', compact('customization', 'candles'));
    }
    
    public function update(Request $request, Customization $customization)
    {
        $request->validate([
            'candle_id' => 'required|exists:candles,id',
            'name' => 'required',
            'value' => 'required',
            'additional_price' => 'required|numeric',
        ]);
        
        $customization->update($request->all());
        
        return redirect()->route('admin.customizations.index')->with('success', 'Personalizzazione aggiornata con successo.');
    }
    
    public function destroy(Customization $customization)
    {
        $customization->delete();
        return redirect()->route('admin.customizations.index')->with('success', 'Personalizzazione eliminata con successo.');
    }
}