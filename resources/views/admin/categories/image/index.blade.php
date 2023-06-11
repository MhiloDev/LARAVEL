@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="section text-center">IMAGENES DE PRODUCTOS "{{$product->name}}"</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf 
            <input type="file" name="img" required>
            <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
            <a href="{{ url('/admin/products') }}" class="btn-success btn btn-round">Volver al listado de productoas<a>
        </form>
        <div class="row mx-auto mt-4">
            @foreach ($image as $img)
                <div class="card" style="width: 18rem;">
                    <img src="{{ $img->img }}">
                 </div>
            @endforeach
        </div>

    </div>
@endsection
