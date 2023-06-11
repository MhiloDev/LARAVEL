@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid">
        <h2 class="section text-center">PRODUCTOS DISPONIBLES</h2>
        <form method="get" action="{{ url('/search') }}" class="form-inline">
            <input type="text" placeholder="¿Cual producto buscas?" class="form-control" name="query">
            <button type="submit" class="btn btn-primary btn-just-icon">Buscar</button>
        </form>
        <div class="col-md-10 mx-auto">
            <div class="section text-center">
                <a href="{{ url('/admin/products/create') }}" class="btn-success btn btn-round">Añadir nuevo producto</a>
            </div>
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
                            <a class="btn btn-round" href="{{ url('/admin/products/' . $product->id . '/edit') }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <a class="btn btn-round" href="{{ url('/admin/products/' . $product->id . '/image') }}"><i
                                    class="fa-solid fa-image"></i></a>
                            <form method="POST" action="{{ url('/admin/products/' . $product->id) }}">
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
