@extends('layouts.app')

@section('title', 'Elenco Candele')

@section('content')
    <h1>Elenco Candele</h1>

    <ul>
        @foreach ($candles as $candle)
            <li>
                <img src="{{ asset('storage/' . $candle->image) }}" alt="{{ $candle->nome }}" width="100">
                {{ $candle->name }} - {{ $candle->price }} €
                <a href="{{ route('candles.show', $candle->id) }}">Dettagli</a>
            </li>
        @endforeach
    </ul>
@endsection