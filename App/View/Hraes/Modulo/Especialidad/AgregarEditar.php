<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_especialidad">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="tituloEspecialidad"
                        class="text-modal-tittle"></label> especialidad.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione la
                                especialidad</label><label class="text-required">*</label>
                            <select data-style="input-select-selectpicker form-control"
                                class="selectpicker form-control" aria-label="Default select example"
                                data-live-search="true" id="id_cat_especialidad_hraes"
                                data-none-results-text="Sin resultados">
                            </select>
                            <!--
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_especialidad_hraes" required>
                                </select>
                            </div>
-->
                        </div>
                    </div>

                    <div id="ocultar_cedula_esp">
                        <div class="div-spacing"></div>
                        <div class="row">
                            <div class="col-12">
                                <label class="text-input-form div-spacing text-input-rem">Especifique una
                                    especialidad</label><label class="text-required">*</label>
                                <input onkeyup="convertirAMayusculas(event,'otro_especialidad')" type="text"
                                    class="form-control" id="otro_especialidad" placeholder="Especialidad"
                                    maxlength="60">
                            </div>
                        </div>
                    </div>


                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">C&eacutedula
                                profesional</label><label class="text-required">*</label>
                            <input oninput="validarNumero(this)" type="number" class="form-control" id="cedula_esp"
                                placeholder="Cédula profesional" maxlength="25">
                        </div>
                    </div>

                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarEspecialidad();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarEspecialidad();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>