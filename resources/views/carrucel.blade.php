@extends('components.layouts.app')

@section('title', 'Imagenes de carrucel')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="titulo pb-2">Imagenes y videos del carrucel</h3>
        <div class="table-responsive py-3">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" class="text-color">#</th>
                        <th scope="col" class="text-color">Nombre</th>
                        <th scope="col" class="text-color">Archivo</th>
                        <th scope="col" class="text-color">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <x-boton-flotante />

        <x-carrucel-modal />

    </div>
@endsection
