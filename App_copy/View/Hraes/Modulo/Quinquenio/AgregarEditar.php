<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_quinquenio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_quinquenio"
                        style="font-weight: bold;color:white"></label> quinquenio.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarQuinquenio();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Seleccione el importe</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_quinquenio">
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha de registro</label><label style="color:red">*</label>
                        <input type="date" class="form-control" id="fecha_registro">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" onclick="salirAgregarEditarQuinquenio();"
                    class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png"
                        alt="Imagen del botón">Cancelar</button>
                <button type="button" onclick="return validarQuinquenio();"
                    class="btn btn-light boton-con-imagen_table color-butto-modulo"><img
                        src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>