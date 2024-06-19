<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_movimiento">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-1">
                            <img src="../../../../assets/sirh/logo_movimiento.png"
                                style="max-width: 120%;margin-top: 20px;">
                        </div>
                        <div class="col-11">
                            <h1 class="text-tittle-card"><label id="tituloMovimiento"></label>
                                movimiento.
                            </h1>
                            <p class="color-text-white">Este espacio está destinado a registrar diversos cambios en el
                                personal, tales como nuevas incorporaciones, salidas de empleados o movimientos dentro
                                de la organización..</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row mx-1">
                        <div class="col-3">
                            <label for="campo" class="form-label input-text-form">Movimiento general</label><label
                                class="text-required">*</label>
                            <select class="form-control div-spacing custom-select" aria-label="Default select example"
                                id="movimiento_general" required>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form">Movimiento
                                espec&iacutefico</label><label class="text-required">*</label>
                            <select class="form-control div-spacing custom-select" aria-label="Default select example"
                                id="id_tbl_movimientos" required>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="campo" class="form-label input-text-form">Fecha de movimiento</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_movimiento">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div id="ocultar_model">
                        <div class="div-spacing"></div>
                        <div class="row mx-1">
                            <div class="col-3">
                                <label for="campo" class="form-label input-text-form">N&uacutem. Plaza
                                    (VACANTES)</label><label class="text-required">*</label>
                                <select data-style="input-select-selectpicker form-control div-spacing custom-select"
                                    class="selectpicker" aria-label="Default select example" data-live-search="true"
                                    id="id_tbl_control_plazas_hraes" data-none-results-text="Sin resultados">
                                </select>
                            </div>
                            <div class="col-4">
                                <fieldset disabled>
                                    <label for="campo" class="form-label input-text-form">Tipo de
                                        contrataci&oacuten</label>
                                    <input type="text" placeholder="Tipo de contratación"
                                        class="form-control custom-input" id="tipo_contratacion_mx">
                                    <div class="line"></div>
                                </fieldset>
                            </div>
                            <div class="col-5">
                                <fieldset disabled>
                                    <label for="campo" class="form-label input-text-form">Centro de
                                        trabajo</label>
                                    <input type="text" placeholder="Centro de trabajo" class="form-control custom-input"
                                        id="centro_trabajo_mx">
                                    <div class="line"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="div-spacing"></div>
                        <div class="row mx-1">
                            <div class="col-3">
                                <label for="campo" class="form-label input-text-form">Fecha de inicio</label><label
                                    class="text-required">*</label>
                                <input type="date" placeholder="Centro de
                                    trabajo" class="form-control custom-input" id="fecha_inicio">
                                <div class="line"></div>
                            </div>
                            <div class="col-4">
                                <label for="campo" class="form-label input-text-form">Fecha de termino</label>
                                <input type="date" placeholder="Tipo de contratación" class="form-control custom-input"
                                    id="fecha_termino">
                                <div class="line"></div>
                            </div>
                            <div class="col-5">
                                <label for="campo" class="form-label input-text-form">Caracter
                                    nombramiento</label>
                                <select class="form-control div-spacing custom-select"
                                    aria-label="Default select example" id="id_cat_caracter_nom_hraes" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row mx-1">
                        <div class="col-3">
                            <label for="campo" class="form-label input-text-form">Motivo</label><label
                                class="text-required">*</label>
                            <input type="text" placeholder="Motivo"
                                onkeyup="convertirAMayusculas(event,'motivo_estatus')" class="form-control custom-input"
                                id="motivo_estatus" maxlength="20">
                            <div class="line"></div>
                        </div>
                        <div class="col-9">
                            <label for="campo" class="form-label input-text-form">Observaciones</label>
                            <input type="text" placeholder="Observaciones" class="form-control custom-input"
                                onkeyup="convertirAMayusculas(event,'observaciones')" id="observaciones" maxlength="70">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div id="ocultar_model_plaza">
                        <div class="div-spacing"></div>
                        <div class="row mx-1">
                            <div class="col-12">
                                <div class="custom-alert">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3" style="border-right: 2px solid #B87400;"></div>
                                        <!-- Línea vertical -->
                                        <p style="font-weight: bold;">Importante: La plaza seleccionada es provisional, por favor ingresa el nuevo número de plaza asignado.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <div class="col-3">
                                <label for="campo" class="form-label input-text-form">Numero de plaza</label><label
                                    class="text-required">*</label>
                                <input oninput="validarNumero(this)" type="number" placeholder="Núm. Plaza" class="form-control custom-input"
                                    id="num_plaza_new" maxlength="15">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarMovimiento();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarAgregar();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
                <input type="hidden" id="situacionPlaza">
            </div>
        </div>
    </div>
</div>


<!--
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_movimiento">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="tituloMovimiento"
                        class="text-modal-tittle"></label> movimiento.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <label class="text-input-form div-spacing text-input-rem">Movimiento general</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="movimiento_general"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <label class="text-input-form div-spacing text-input-rem">Movimiento
                                espec&iacutefico</label><label class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_tbl_movimientos"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Fecha de movimiento</label><label
                                class="text-required">*</label>
                            <input type="date" type="number" class="form-control" id="fecha_movimiento"
                                placeholder="Cuenta clabe" maxlength="18">
                        </div>
                    </div>
                </div>
            </div>

            <div id="ocultar_model">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">N&uacutem. Plaza</label><label
                                    class="text-required">*</label>
                                <select data-style="input-select-selectpicker form-control" class="selectpicker"
                                    aria-label="Default select example" data-live-search="true"
                                    id="id_tbl_control_plazas_hraes" data-none-results-text="Sin resultados">
                                </select>
                            </div>

                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Tipo de
                                    contrataci&oacuten</label><label class="text-required">*</label>
                                <fieldset disabled>
                                    <input type="text" class="form-control" id="tipo_contratacion_mx"
                                        placeholder="Tipo de contratación" maxlength="18" disable>
                                </fieldset>
                            </div>

                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Centro de
                                    trabajo</label><label class="text-required">*</label>
                                <fieldset disabled>
                                    <input type="text" class="form-control" id="centro_trabajo_mx"
                                        placeholder="Centro de trabajo" maxlength="18" disable>
                                </fieldset>
                            </div>

                        </div>

                        <div class="div-spacing"></div>
                        <div class="row">
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Fecha de inicio</label><label
                                    class="text-required">*</label>
                                <input type="date" class="form-control" id="fecha_inicio" placeholder="" maxlength="18">
                            </div>
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Fecha de termino</label><label
                                    class="text-required"></label>
                                <input type="date" type="number" class="form-control" id="fecha_termino"
                                    placeholder="Cuenta clabe" maxlength="18">
                            </div>
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Caracter
                                    nombramiento</label><label class="text-required">*</label>
                                <div class="custom-select-wrapper">
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_caracter_nom_hraes" required>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Motivo</label><label
                                class="text-required"></label>
                            <input onkeyup="convertirAMayusculas(event,'motivo_estatus')" type="text" class="form-control" id="motivo_estatus" placeholder="Motivo"
                                maxlength="20" disable>
                        </div>
                        <div class="col-8">
                            <label class="text-input-form div-spacing text-input-rem">Observaciones</label><label
                                class="text-required"></label>
                            <input onkeyup="convertirAMayusculas(event,'observaciones')" type="text" class="form-control" id="observaciones" placeholder="Observaciones"
                                maxlength="50" disable>
                        </div>
                    </div>
                </div>
            </div>


            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarMovimiento();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarAgregar();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>
-->