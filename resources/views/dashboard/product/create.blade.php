<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Producto</title>
</head>

<body>
    @extends('dashboard.layout')

    @section('content')
    <h1>Crear Producto</h1>

    @if ($errors->any())
    @foreach ($errors->all() as $e)
    <div class="error">
        {{ $e }}
    </div>
    @endforeach
    @endif

    <form action="{{ route('product.store') }}" method="post">
        @csrf

        <label for="">Modelo</label>
        <input type="text" name="model">

        <label for="">Código</label>
        <input type="text" name="code">

        <label for="">Descripcion</label>
        <textarea name="description"></textarea>

        <label for="">Fabricante</label>
        <input type="text" name="maker">

        <label for="">Ubicación</label>
        <select name="location_id">
            <option value=""></option>
            @foreach ($locations as $name => $id)
            <option value="{{$id}}">{{{$name}}}</option>
            @endforeach
        </select>

        <label for="">Estado</label>
        <select name="condition">
            <option value=""></option>
            <option value="activo">activo</option>
            <option value="roto">roto</option>
            <option value="desaparecido">desaparecido</option>
        </select>

        <label for="">Stock</label>
        <input type="number" name="stock">


        <button type="submit">Enviar</button>
    </form>
    @endsection
</body>

</html>
