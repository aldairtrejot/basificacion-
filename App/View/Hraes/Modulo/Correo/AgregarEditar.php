<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_correo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_correo" class="text-modal-tittle"></label>
                    correo electr&oacutenico.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        <label class="text-input-form text-input-rem">Correo electr&oacutenico</label><label class="text-required">*</label>
                        <input type="email" class="form-control" id="correo_electronico"
                            placeholder="Correo electrónico" maxlength="40">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarCorreo();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarCorreo();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>