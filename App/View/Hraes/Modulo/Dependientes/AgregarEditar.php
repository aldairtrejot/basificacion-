<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_dependiente">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_dependiete"
                        class="text-modal-tittle"></label> dependiente econ&oacutemico.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Nombre (s)</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'nombre_d')" type="text" class="form-control"
                                id="nombre_d" placeholder="Nombre" maxlength="20">
                        </div>
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Curp</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'curp_d')" type="text" class="form-control"
                                id="curp_d" placeholder="Curp" maxlength="28">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Apellido paterno</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'apellido_paterno_d')" type="text" class="form-control"
                                id="apellido_paterno_d" placeholder="Apellido paterno" maxlength="20">
                        </div>
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Tipo dependiente</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_dependientes_economicos_d" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form text-input-rem">Apellido materno</label><label
                                class="text-required"></label>
                            <input onkeyup="convertirAMayusculas(event,'apellido_materno_d')" type="text" class="form-control"
                                id="apellido_materno_d" placeholder="Apellido materno" maxlength="20">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarDependiente();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarDependienteD();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>