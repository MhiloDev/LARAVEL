@extends('layouts.app')

@section('content')
    Probando ...

    <div class="container-fluid">
        <h2 class="section text-center">PRODUCTOS DISPONIBLES</h2>
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                @foreach ($products as $product);
                    <tbody>
                        <td> {{ $product->name }} </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <img src="{{ $product->$image->img }}" class="img-raised img-circle">
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
{{--         <img src="{{ $product->image->img }}" class="img-raised img-circle">
 --}}
