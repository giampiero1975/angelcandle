<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $candle->name }}</title>
</head>
<body>
    <h1>{{ $candle->name }}</h1>

    <p>{{ $candle->description }}</p>
    <p>Prezzo: {{ $candle->price }} €</p>

    <a href="{{ route('candles.index') }}">Torna all'elenco</a>
</body>
</html>