@extends('layouts.app')

@section('content')
    <h1>Modifica Candela</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.candles.update', $candle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $candle->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control">{{ $candle->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $candle->price }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if ($candle->image)
            	<img src="{{ asset('storage/' . $candle->image) }}" alt="{{ $candle->nome }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
@endsection