<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_cedula">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="tituloCedula"
                        style="font-weight: bold;color:white"></label> c&eacutedula profesional</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salirAgregarEditarCedula_x();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label>C&eacutedula profesional</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="cedula_profesional" placeholder="Cédula profesional" maxlength="25">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" onclick="salirAgregarEditarCedula_x();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  
                <button type="button" 
                    onclick="return validarCedula();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>   

                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>