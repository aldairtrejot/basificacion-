<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_movimiento">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="tituloMovimiento"
                        style="font-weight: bold;color:white"></label> movimiento.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarMovimiento();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Movimiento general</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="movimiento_general"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-8">
                        <label>Movimiento espec&iacutefico</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_tbl_movimientos"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Fecha de movimiento</label><label style="color:red">*</label>
                        <input type="date" type="number" class="form-control" id="fecha_movimiento"
                            placeholder="Cuenta clabe" maxlength="18">
                    </div>

                </div>

                <div id="ocultar_model">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>N&uacutem. de plaza</label><label style="color:red">*</label>
                            <input onkeyup="validarNumPlaza();" type="text" class="form-control" id="num_plaza_m"
                                placeholder="Núm. de plaza" maxlength="18" disable>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Tipo de plaza</label><label style="color:red">*</label>
                            <fieldset disabled>
                                <input type="text" class="form-control" id="tipo_plaza_m" placeholder="Tipo de plaza"
                                    maxlength="18" disable>
                            </fieldset>
                        </div>

                        <div class="form-group col-md-5">
                            <label>Unidad responsable</label><label style="color:red">*</label>
                            <fieldset disabled>
                                <input type="text" class="form-control" id="unidad_responsable_m"
                                    placeholder="Unidad responsable" maxlength="18" disable>
                            </fieldset>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Fecha de inicio</label><label style="color:red">*</label>
                            <input type="date" class="form-control" id="fecha_inicio" placeholder="Cuenta clabe"
                                maxlength="18">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Fecha de termino</label><label style="color:red">*</label>
                            <input type="date" type="number" class="form-control" id="fecha_termino"
                                placeholder="Cuenta clabe" maxlength="18">
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button"  data-dismiss="modal"
                    onclick="salirAgregarEditarMovimiento();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  
                <button type="button" 
                    onclick="return validarPw();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>   
                <input type="hidden" id="id_object">
                <input type="hidden" id="id_tipo_plaza">
                <input type="hidden" id="id_plaza">

                <input type="hidden" id="num_plaza_validate">
                <input type="hidden" id="id_tbl_movimientos_validate">
            </div>

        </div>
    </div>
</div>