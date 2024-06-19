<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_forma_pago">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="tituloFormaPago" class="text-modal-tittle"></label>
                    forma de pago.</h5>
            </div>

            <div class="alert alert-warning text-input-rem" role="alert">
                <i class="fas fa-exclamation-circle"></i> Solo una forma de pago puede estar activa.
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Cuenta clabe</label><label
                                class="text-required">*</label>
                            <input onkeyup="validarCuenta();" type="number" class="form-control" id="clabe"
                                placeholder="Cuenta clabe" maxlength="18">
                        </div>
                        <div class="col-6">
                            <label class="text-input-rem">Banco</label><label style="color:red">*</label>
                            <fieldset disabled>
                                <input type="text" class="form-control" id="nombre_banco" placeholder="Banco"
                                    maxlength="18" disable>
                            </fieldset>
                        </div>
                    </div>
                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Estatus</label><label
                                class="text-required">*</label>

                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_estatus_formato_pago" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-input-rem">Forma de pago</label><label style="color:red">*</label>
                            <fieldset disabled>
                                <input type="text" class="form-control" id="nombre_banco_not"
                                    placeholder="TRANSFERENCIA" maxlength="18" disable value="TRANSFERENCIA">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarFormaPago();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarFormaPago();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
                <input type="hidden" id="id_cat_banco">
            </div>
        </div>
    </div>
</div>