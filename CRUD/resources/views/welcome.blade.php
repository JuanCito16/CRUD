@extends('layout.plantilla')

@section('contenido')
<div class="container text-center">
    <h1 class="display-4 mb-4">CRUD Personas</h1>
    @if(Session::has('success'))
    <div class="alert alert-success animated-alert" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger animated-alert" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger animated-alert" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Personas</h5>
                    <p class="card-text">Añade, edita y elimina personas</p>
                    <button data-bs-toggle="modal" data-bs-target="#modalAñadir" class="btn btn-success"><i
                            class="fa-solid fa-circle-plus me-1"></i> Añadir Persona</button>
                    @include('agregar')
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            @include('tabla')
        </div>
    </div>
</div>
@endsection
