@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Localizacion: {{ $location->model }}</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('location.update', $location->id) }}" method="post">

        @method('PATCH')
        @include('dashboard.location._form')

    </form>
@endsection
