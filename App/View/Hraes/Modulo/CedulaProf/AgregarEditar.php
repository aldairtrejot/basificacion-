<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_cedula">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title  text-modal-tittle"><label id="tituloCedula" class="text-modal-tittle"></label>
                    c&eacutedula profesional</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">C&eacutedula
                                profesional</label><label class="text-required">*</label>
                            <input oninput="validarNumero(this)" type="number" class="form-control" id="cedula_profesional"
                                placeholder="Cédula profesional" maxlength="25">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarCedula_x();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarCedula();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>