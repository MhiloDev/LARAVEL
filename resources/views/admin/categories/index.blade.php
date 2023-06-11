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
        <h2 class="section text-center">CATEGORIAS</h2>
        <div class="col-md-10 mx-auto">
            <div class="section text-center">
                <a href="{{ url('/admin/categories/create') }}" class="btn-success btn btn-round">Añadir nueva categoria</a>
            </div>
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Modificadores</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                    <tbody>
                        <td> {{ $category->name }} </td>
                        <td> {{ $category->description }}</td>
                        <td>
                            <a class="btn btn-round" href="{{ url('/admin/categories/' . $category->id . '/edit') }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <a class="btn btn-round" href="{{ url('/admin/categories/' . $category->id . '/image') }}"><i
                                    class="fa-solid fa-image"></i></a>
                            <form method="POST" action="{{ url('/admin/categories/' . $category->id) }}">
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
        {{ $categories->links() }}
    </div>
@endsection
