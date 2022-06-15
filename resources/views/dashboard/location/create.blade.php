@extends('dashboard.layout')

@section('content')
    <h1>Crear Localizacion</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('location.store') }}" method="post">
        @include('dashboard.location._form')

    </form>
@endsection
