@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Producto: {{ $product->model }}</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">

        @method('PATCH')
        @include('dashboard.product._form', ['task' => 'edit'])

    </form>
@endsection
