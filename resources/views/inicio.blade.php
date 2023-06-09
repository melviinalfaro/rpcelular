@extends('components.layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="titulo pb-2">Panel administrativo</h3>

        <div class="row py-3">
            <div class="col-md-6">
                <div id="carrucelPublicidad" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="{{ asset('images/1.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="{{ asset('images/4.jpg') }}" class="d-block w-100" alt="...">
                        </div>
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
                    <a href="{{ route('carrucel') }}">
                        <button class="btn-imagenes btn btn-primary">
                            <i class="material-symbols-rounded">add_photo_alternate</i>
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
