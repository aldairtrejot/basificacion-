<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_quinquenio">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_quinquenio"
                        class="text-modal-tittle"></label> quinquenio.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione el
                                importe</label><label class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_quinquenio">
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-6">
                            <label class="text-input-form div-spacing text-input-rem">Fecha de registro</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_registro">
                        </div>
-->
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarQuinquenio();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarQuinquenio();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>