<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_retardo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_retardo" class="text-modal-tittle"></label>
                    asistencia</h5>
            </div>

            <div class="card-body">
                <div class="container">

                    <div id="ocultar_hora">
                        <div class="row">
                            <div class="col-6">
                                <label class="text-input-form text-input-rem">Fecha entrada</label><label
                                    class="text-required">*</label>
                                <input type="date" class="form-control" id="fecha" placeholder="Curp" maxlength="20">
                            </div>
                            <div class="col-6">
                                <label class="text-input-form text-input-rem">Hora salida</label><label
                                    class="text-required">*</label>
                                <input type="time" class="form-control" id="hora" placeholder="Apellido paterno"
                                    maxlength="20">
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-12">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione el tipo</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="cat_asistencia_bas">
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="ocultar_estatus">
                        <div class="div-spacing"></div>
                        <div class="row">
                            <div class="col-12">
                                <label class="text-input-form div-spacing text-input-rem">Seleccione el
                                    estatus</label><label class="text-required">*</label>
                                <div class="custom-select-wrapper">
                                    <select class="form-control" aria-label="Default select example"
                                        id="cat_estatus_bas">
                                    </select>
                                </div>
                            </div>

                            <div class="div-spacing"></div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="text-input-form text-input-rem">Observaciones</label><label
                                        class="text-required">*</label>
                                    <input onkeyup="convertirAMayusculas(event,'observaciones_bas')" type="text"
                                        class="form-control" id="observaciones_bas" placeholder="Observaciones"
                                        maxlength="100">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarRetardo();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarDependiente();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>