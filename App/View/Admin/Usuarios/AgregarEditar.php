<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_usuario">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle" ><label id="titulo_usuario"
                        claa="text-modal-tittle"></label> usuario</h5>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Nick</label><label class="text-required">*</label>
                            <input maxlength="15" type="text" class="form-control" id="nick" name="nombre"
                                placeholder="Nick" required>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Nombre</label><label class="text-required">*</label>
                            <input maxlength="60" type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Contraseña</label><label class="text-required">*</label>
                            <input maxlength="15" type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña">
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Confirmar contraseña</label><label class="text-required">*</label>
                            <input maxlength="15" type="password" class="form-control" id="passwordConfirm"
                                name="passwordConfirm" placeholder="Confirmar contraseña">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Rol</label><label class="text-required">*</label>
                            <select class="form-control" aria-label="Default select example" id="id_rol" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="ocultarModal();" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarUsuario();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>