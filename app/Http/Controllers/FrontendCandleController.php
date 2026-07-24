<?php

namespace App\Http\Controllers;

use App\Models\Candle;
use Illuminate\Http\Request;

class FrontendCandleController extends Controller
{
    //
    public function index()
    {
        $candles = Candle::all();
        return view('candles.index', compact('candles'));
    }
    
    public function show(Candle $candle)
    {
        return view('candles.show', compact('candle'));
    }
}
