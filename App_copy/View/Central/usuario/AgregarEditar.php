<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="update_user_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <form action="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Edad</label><label style="color:red">*</label>
                            <input type="number" class="form-control" id="edad" name="edad" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Fecha de nacimiento</label><label style="color:red">*</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                placeholder="">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_usuario_pk">
            </div>

        </div>
    </div>
</div>



<!--
                <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="idalumno">Cod. Alumno</label>
                                    <input type="text" id="nombre" value="" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="codalumno">Cod. Alumno</label>
                                    <input type="text" id="update_codalumno" placeholder="Last Name"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="obs">Observaciones</label>
                                    <textarea style="text-transform:uppercase" id="update_obs"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()">Guardar
                                    Cambios</button>
                                <input type="hidden" id="hidden_user_id">
                            </div>
                        </div>
                    </div>
                </div>

            -->