@extends('dashboard.layout')

@section('content')
    <h1>Producto: {{ $product->code }}</h1>

    <p>{{ $product->maker }}</p>

    <p>{{ $product->description }}</p>

    <p>{{ $product->stock }}</p>

    <div>{{ $product->content }}</div>
@endsection
