<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_jefe">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="tituloJefe" class="text-modal-tittle"></label>.
                </h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione el idioma o lengua</label><label
                                class="text-required">*</label>
                                <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_lengua_idioma" required>
                                </select>
                            </div>
                            <!--
                            <select data-style="input-select-selectpicker form-control"
                                class="selectpicker form-control" aria-label="Default select example"
                                data-live-search="true" id="id_cat_lengua_idioma"
                                data-none-results-text="Sin resultados">
                            </select>
-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarCedula();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarJefe();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>