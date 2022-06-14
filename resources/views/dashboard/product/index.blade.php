@extends('dashboard.layout')

@section('content')
    <a href="{{ route('product.create') }}">Crear</a>

    <table>
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
                        <a href="{{ route('product.edit', $p) }}">Editar</a>
                        <a href="{{ route('product.show', $p) }}">Ver</a>


                        <form action="{{ route('product.destroy', $p) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
