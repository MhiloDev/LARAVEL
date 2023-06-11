@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="section text-center">Registrar Nuevo Producto</h2>
        <div class="col-md-10 mx-auto mt-4">
            <div class="section text-center">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ url('/admin/products') }}">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Precio</label>
                                <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descripcion del producto" name="description" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea">Descripcion del producto</label>
                        </div>
                        <div class="form-control label-floating">
                            <label for="floatingTextarea">Categoria del Producto</label>
                            <select class="form-control" name="category_id">
                                <option value="0">General</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn-success btn btn-round">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
