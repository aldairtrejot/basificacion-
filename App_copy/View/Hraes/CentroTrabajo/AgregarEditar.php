<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_centro_trabajo"
                        style="font-weight: bold;color:white"></label> centro de trabajo.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre</label><label style="color:red">*</label>
                        <input maxlength="30" type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Nombre" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Clave centro de trabajo</label><label style="color:red">*</label>
                        <input maxlength="10" type="text" class="form-control" id="clave_centro_trabajo"
                            name="clave_centro_trabajo" placeholder="Clave centro de trabajo">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Colonia</label><label style="color:red"></label>
                        <input maxlength="30" type="text" class="form-control" id="colonia" name="colonia"
                            placeholder="Colonia">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Region</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_region" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estatus</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_estatus_centro"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Entidad</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_entidad" required>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>N&uacutem. exterior</label><label style="color:red"></label>
                        <input type="text" class="form-control" id="num_exterior" name="num_exterior"
                            placeholder="Núm. exterior" maxlength="10">
                    </div>

                    <div class="form-group col-md-4">
                        <label>N&uacutem. interior</label><label style="color:red"></label>
                        <input type="text" class="form-control" id="num_interior" name="num_interior"
                            placeholder="Núm. interior" maxlength="10">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Latitud</label><label style="color:red">*</label>
                        <input maxlength="10" type="text" class="form-control" id="latitud" name="latitud"
                            placeholder="Latitud">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Longitud</label><label style="color:red">*</label>
                        <input maxlength="10" type="text" class="form-control" id="longitud" name="longitud"
                            placeholder="Longitud">
                    </div>

                    <div class="form-group col-md-4">
                        <label>C&oacutedigo postal</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="codigo_postal" name="codigo_postal"
                            placeholder="Código postal">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Pa&iacutes</label><label style="color:red"></label>
                        <input maxlength="10" type="text" class="form-control" id="pais" name="País" placeholder="País">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-light boton-con-imagen_table"><img
                        src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>
                <button type="button" onclick="return validar();"
                    class="btn btn-light boton-con-imagen_table color-butto-modulo"><img
                        src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>