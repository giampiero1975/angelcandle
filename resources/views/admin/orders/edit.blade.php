@extends('layouts.app')

@section('content')
    <h1>Modifica Ordine #{{ $order->id }}</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Stato</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>In attesa</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>In elaborazione</option>
                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completato</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Annullato</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
@endsection