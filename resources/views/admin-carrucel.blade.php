@extends('components.layouts.app')

@section('title', 'Archivos del carrucel')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="titulo pb-2">Imágenes del carrucel</h3>
        <div class="table-responsive py-3">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" class="text-color">#</th>
                        <th scope="col" class="text-color">Nombre</th>
                        <th scope="col" class="text-color">Imagen</th>
                        <th scope="col" class="text-color">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1; ?>
                    @foreach ($carruceles as $carrucel)
                        <tr class="searchable">
                            <td class="text-center table-text">{{ $c++ }}</td>
                            <td data-label="Nombre" class="table-text">{{ $carrucel->nombre }}</td>
                            <td data-label="Imagen"><img class="imagen"
                                    src="{{ URL::to('/') . '/carrucel/' . $carrucel->id . '/' . $carrucel->imagen }}"></td>
                            <td data-label="Acciones">
                                <div class="d-flex flex-column flex-sm-row align-items-center">
                                    <div class="btn-group m-1" role="group">
                                        <form action="" method="GET">
                                            @csrf
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#modal{{ $carrucel->id }}">
                                                <i class="material-icons-round">visibility</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="modal{{ $carrucel->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel{{ $carrucel->id }}" aria-hidden="true"
                                        data-bs-backdrop="static" data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-color" id="imagenModalLabel">
                                                        {{ $carrucel->nombre }}</h1>
                                                    <button class="btn-cerrar">
                                                        <i class="icon material-icons-round"
                                                            data-bs-dismiss="modal">close</i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="imagen-ver"
                                                        src="{{ URL::to('/') . '/carrucel/' . $carrucel->id . '/' . $carrucel->imagen }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group m-1" role="group">
                                        <form action="" method="GET">
                                            @csrf
                                            @method('UPDATE')
                                            <button type="submit" class="btn btn-warning">
                                                <i class="material-icons-round">border_color</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="btn-group m-1" role="group">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmacionModal{{ $carrucel->id }}">
                                            <i class="material-icons-round">delete</i>
                                        </button>
                                        <div class="modal fade" id="confirmacionModal{{ $carrucel->id }}" tabindex="-1"
                                            aria-labelledby="confirmacionModalLabel{{ $carrucel->id }}" aria-hidden="true"
                                            data-bs-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-color"
                                                            id="confirmacionModalLabel{{ $carrucel->id }}">
                                                            Confirmar eliminación</h5>
                                                        <button class="btn-cerrar">
                                                            <i class="icon material-icons-round"
                                                                data-bs-dismiss="modal">close</i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-color">
                                                        ¿Está seguro de que desea eliminar la imagen?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <form
                                                            action="{{ route('eliminar-carrucel', ['id' => $carrucel->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-boton-flotante />

        <x-carrucel-modal />

        <x-notificaciones />

    </div>
@endsection
