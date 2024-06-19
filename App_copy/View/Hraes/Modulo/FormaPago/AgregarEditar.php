<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_forma_pago">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="tituloFormaPago"
                        style="font-weight: bold;color:white"></label> forma de pago.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarFormaPago();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-warning" role="alert">
                <i class="fas fa-exclamation-circle"></i> Solo una forma de pago puede estar activa.
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Cuenta clabe</label><label style="color:red">*</label>
                        <input onkeyup="validarCuenta();" type="number" class="form-control" id="clabe"
                            placeholder="Cuenta clabe" maxlength="18">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Banco</label><label style="color:red">*</label>
                        <fieldset disabled>
                            <input type="text" class="form-control" id="nombre_banco" placeholder="Banco" maxlength="18"
                                disable>
                        </fieldset>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estatus</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_estatus_formato_pago" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Forma de pago</label><label style="color:red">*</label>
                        <fieldset disabled>
                            <input type="text" class="form-control" id="nombre_banco_not" placeholder="Transferencia" maxlength="18"
                                disable value="Transferencia">
                        </fieldset>
                    </div>

                    <!--
                    <div class="form-group col-md-6">
                        <label>Forma de pago</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_formato_pago"
                            required>
                        </select>
                    </div>-->

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal"
                    onclick="salirAgregarEditarFormaPago();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  
                <button type="button" 
                    onclick="return validarFormaPago();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>   
                <input type="hidden" id="id_object">
                <input type="hidden" id="id_cat_banco">
            </div>

        </div>
    </div>
</div>