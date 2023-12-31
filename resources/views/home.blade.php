@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div>
                <ul class="nav nav-underline justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ url('admin/products') }}">Ver Productos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('admin/categories') }}">Ver Categorias</a>
                    </li>
                  </ul>
            </div>
        </div>
    </div>
</div>
@endsection
