<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_dependiente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_dependiete"
                        style="font-weight: bold;color:white"></label> dependiente econ&oacutemico</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarDependiente();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre (s)</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="nombre_d" placeholder="Nombre"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Curp</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="curp_d" placeholder="Curp"
                            maxlength="28">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido paterno</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="apellido_paterno_d" placeholder="Apellido paterno"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tipo dependiente</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_dependientes_economicos_d" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido materno</label><label style="color:red"></label>
                        <input type="text" class="form-control" id="apellido_materno_d" placeholder="Apellido materno"
                            maxlength="20">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button"  data-dismiss="modal"
                    onclick="salirAgregarEditarDependiente();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  

                <button type="button" 
                    onclick="return validarDependienteD();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>   
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>