<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_telefono">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_fijo"
                        style="font-weight: bold;color:white"></label> n&uacutemero telef&oacutenico</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarTelefono();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-circle"></i> Solo un n&uacutemero telef&oacutenico puede estar activo
            </div>


            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>N&uacutemero telef&oacutenico</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="movil" placeholder="Número telefónico"
                            maxlength="10">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estatus</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_estatus" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Telefono fijo</label><label style="color:red"></label>
                        <input type="number" class="form-control" id="telefono" placeholder="Telefono" maxlength="10">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal"
                    onclick="salirAgregarEditarTelefono();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button> 
                <button type="button"
                    onclick="return validarTelefono();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>   
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>