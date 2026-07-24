@extends('layouts.app')

@section('content')
    <h1>Dettagli Ordine #{{ $order->id }}</h1>

    <p>
        <strong>Data:</strong> {{ $order->created_at }}<br>
        <strong>Stato:</strong> {{ $order->status }}
    </p>

    <h2>Informazioni Utente</h2>
    <p>
        <strong>Nome:</strong> {{ $order->user->name }}<br>
        <strong>Email:</strong> {{ $order->user->email }}
    </p>

    <h2>Articoli Ordinati</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantità</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Totale:</strong> {{ $order->total }} €</p>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Torna all'elenco ordini</a>
@endsection