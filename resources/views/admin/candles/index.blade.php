@extends('layouts.app')

@section('content')
    <h1>Elenco Candele</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.candles.create') }}" class="btn btn-primary mb-3">Aggiungi Candela</a>

    <table class="table">
        <thead>
            <tr>
                <th>Immagine</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candles as $candle)
                <tr>
                    <td>
                        @if ($candle->image)
                        	<img src="{{ asset('storage/' . $candle->image) }}" alt="{{ $candle->nome }}" width="100">
                        @else
                            Nessuna immagine
                        @endif
                    </td>
                    <td>{{ $candle->name }}</td>
                    <td>{{ $candle->price }} €</td>
                    <td>
                        <a href="{{ route('admin.candles.edit', $candle->id) }}" class="btn btn-sm btn-primary">Modifica</a>
                        <form action="{{ route('admin.candles.destroy', $candle->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa candela?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection