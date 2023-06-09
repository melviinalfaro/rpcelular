<div class="modal fade" id="subirModal" tabindex="-1" aria-labelledby="subirModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-color" id="exampleModalLabel">Carrucel publicitario</h1>
                <button class="btn-cerrar">
                    <i class="icon material-symbols-rounded" data-bs-dismiss="modal">close</i>
                </button>
            </div>
            <form id="carrucelForm" method="POST" action="" class="form" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre-input" class="label-file text-color">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" autofocus class="form-control" id="nombre-input" required>
                        <div class="invalid-feedback invalid-feedback-nombre">Por favor ingresa un nombre
                            válido</div>
                    </div>
                    <div class="form-group">
                        <label for="file-upload-input" class="label-file text-color">{{ __('Archivo') }}</label>
                        <label for="file-upload-input" class="file-upload">
                            <p>Selecciona la imagen o video</p>
                            <small>1000 por 562 píxeles</small>
                            <span class="image-upload-name"></span>
                        </label>
                        <input type="file" name="archivo" accept=".jpg, .jpeg, .png, .svg .webp .mp4 .mov .mkv"
                            id="file-upload-input" class="file-upload-input" required>
                        <div class="invalid-feedback invalid-feedback-file">Por favor selecciona un archivo</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="subir" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/carrucel.js') }}"></script>
