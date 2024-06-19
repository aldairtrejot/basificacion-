<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_juguete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_juguete"
                        style="font-weight: bold;color:white"></label> menor del programa</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salirAgregarEditarJuguete();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Dependiente econ&oacutemico</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_ctrl_dependientes_economicos_j" required onchange="handleChange(event)">
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Curp</label><label style="color:red">*</label>
                        <fieldset disabled>
                            <input type="text" class="form-control" id="curp_j" placeholder="Curp"
                                maxlength="18" disable>
                        </fieldset>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_fecha_juguetes_j" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estatus</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_estatus_juguetes_j" required>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" onclick="salirAgregarEditarJuguete();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  
                <button type="button" 
                    onclick="return validarJuguete();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>  
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>