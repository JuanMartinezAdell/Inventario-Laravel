@extends('dashboard.layout')

@section('content')
    <a class="my-2 btn btn-success" href="{{ route('location.create') }}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Ciudad
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Direcciones
                </th>
                <th>
                    Numero
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $l)
                <tr>
                    <td>
                        {{ $l->city }}
                    </td>
                    <td>
                        {{ $l->name }}
                    </td>
                    <td>
                        {{ $l->address }}
                    </td>
                    <td>
                        {{ $l->number }}
                    </td>
                    <td>
                        <a class="btn btn-primary mt-2" href="{{ route('location.edit', $l) }}">Editar</a>
                        <a class="btn btn-primary mt-2" href="{{ route('location.show', $l) }}">Ver</a>


                        <form action="{{ route('location.destroy', $l) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger mt-2  " type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr> mt-2
            @endforeach
        </tbody>
    </table>
    {{ $locations->links() }}
@endsection
