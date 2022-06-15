@extends('dashboard.layout')

@section('content')
    <a class="btn btn-warning m-3" href="{{ route('product.create') }}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Modelo
                </th>
                <th>
                    Código
                </th>
                <th>
                    Fabricante
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Stock
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>
                        {{ $p->model }}
                    </td>
                    <td>
                        {{ $p->code }}
                    </td>
                    <td>
                        {{ $p->maker }}
                    </td>
                    <td>
                        {{ $p->description }}
                    </td>
                    <td>
                        {{ $p->stock }}
                    </td>
                    <td>
                        {{ $p->condition }}
                    </td>
                    <td>
                        <a class="btn btn-success my-2" href="{{ route('product.edit', $p) }}">Editar</a>
                        <a class="btn btn-primary my-2" href="{{ route('product.show', $p) }}">Ver</a>


                        <form action="{{ route('product.destroy', $p) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger my-2" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
