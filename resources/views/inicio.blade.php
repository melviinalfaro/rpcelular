@extends('components.layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="titulo pb-2">Panel administrativo</h3>

        <div class="row py-3">
            <div class="col-md-6">
                <div id="carrucelPublicidad" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($carruceles as $index => $carrucel)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
                                <img src="{{ URL::to('/') . '/carrucel/' . $carrucel->id . '/' . $carrucel->imagen }}"
                                    class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carrucelPublicidad"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carrucelPublicidad"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <a href="{{ route('subir.carrucel') }}">
                        <button class="btn-imagenes btn btn-primary">
                            <i class="material-icons-round">add_photo_alternate</i>
                            Agregar
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@endsection
