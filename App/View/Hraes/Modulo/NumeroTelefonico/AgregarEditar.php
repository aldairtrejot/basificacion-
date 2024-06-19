<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_telefono">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_fijo" class="text-modal-tittle"></label>
                    n&uacutemero telef&oacutenico</h5>
            </div>

            <div class="alert alert-warning text-input-rem" role="alert">
                <i class="fas fa-exclamation-circle"></i> Solo un n&uacutemero telef&oacutenico puede estar activo
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">N&uacutemero telef&oacutenico</label><label
                                class="text-required">*</label>
                            <input oninput="validarNumero(this)" type="number" class="form-control" id="movil" placeholder="Número telefónico"
                                maxlength="10">
                        </div>
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Estatus</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_estatus"
                                    required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Telefono fijo</label><label
                                class="text-required"></label>
                            <input oninput="validarNumero(this)" type="number" class="form-control" id="telefono" placeholder="Telefono"
                                maxlength="10">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarTelefono();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarTelefono();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>