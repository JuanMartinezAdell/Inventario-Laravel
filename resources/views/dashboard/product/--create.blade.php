@extends('dashboard.layout')

@section('content')
    <h1>Crear Producto</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('product.store') }}" method="post">
        @include('dashboard.product._form')

    </form>
@endsection
