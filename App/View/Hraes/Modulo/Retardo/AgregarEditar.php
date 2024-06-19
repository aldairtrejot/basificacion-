<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_retardo">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_retardo" class="text-modal-tittle"></label>
                    retardo</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_retardo" placeholder="Nombre"
                                maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Hora entrada</label><label
                                class="text-required">*</label>
                            <input type="time" class="form-control" id="hora_entrada" placeholder="Curp" maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Hora salida</label><label
                                class="text-required">*</label>
                            <input type="time" class="form-control" id="hora_salida" placeholder="Apellido paterno"
                                maxlength="20">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarRetardo();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarDependiente();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>