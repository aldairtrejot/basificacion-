<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_contacto_emergencia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_emergencia"
                        style="font-weight: bold;color:white"></label> contacto de emergencia.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarEmergencia();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Parentesco</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="parentesco" placeholder="Parentesco"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido paterno</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="primer_apellido" placeholder="Apellido paterno"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>N&uacutem. Telef&oacutenico</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="movil_emergencia" placeholder="Número telefónico"
                            maxlength="10">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido materno</label><label style="color:red"></label>
                        <input type="text" class="form-control" id="segundo_apellido" placeholder="Apellido materno"
                            maxlength="20">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button"  data-dismiss="modal"
                    onclick="salirAgregarEditarEmergencia();" class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>  
                <button type="button" 
                    onclick="return validarEmergencia();" class="btn btn-light boton-con-imagen_table color-butto-modulo"><img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button> 
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>