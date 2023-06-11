@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="section text-center">Registrar Nueva Categoria</h2>
        <div class="col-md-10 mx-auto mt-4">
            <div class="section text-center">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ url('/admin/categories') }}">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descripcio de la categoria" name="description" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea">Descripcion de la categoria</label>
                        </div>
                        <button class="btn-success btn btn-round">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
