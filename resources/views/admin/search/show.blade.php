@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="section text-center">Resultados de busqueda</h2>
        <div class="col-md-10 mx-auto">
            <div class="description text-center">
                <p>Se encontraron <b>{{ $products->count() }}</b> resultados para el termino <b>{{ $query }}</b> </p>
            </div>
            <a href="{{ url('/admin/products') }}" class="btn-secondary btn btn-round section text-center">Volver</a>
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Modificadores</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tbody>
                        <td> {{ $product->id }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->description }}</td>
                        <td> {{ $product->category ? $product->category->name : 'General' }}</td>
                        <td> {{ $product->price }}</td>
                        <td>
                            <a class="btn btn-round" href="{{ url ('/admin/products/'.$product->id.'/edit') }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a class="btn btn-round" href="{{ url ('/admin/products/'.$product->id.'/image') }}"><i class="fa-solid fa-image"></i></a>
                            <form method="POST" action="{{ url ('/admin/products/'.$product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-round">Eliminar</button>
                            </form>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div>
        {{ $products->links() }}
    </div>
@endsection
