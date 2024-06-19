<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="mostar_detalles_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"></label>Informaci&oacuten de la plaza.
                </h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a style="font-weight: bold" class="nav-link active text-secondary" id="home-tab"
                            data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i
                                class="fa fa-archive"></i>
                            Informaci&oacuten de la plaza.</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-weight: bold" class="nav-link text-secondary" id="profile-tab" data-toggle="tab"
                            href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i
                                class="fa fa-table"></i> Historia de la
                            plaza.</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <h6 style="color:#BC955C;font-weight: bold"><i class="fa fa-info-circle"></i> Informaci&oacuten
                            de la plaza.</h6>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">N&uacutemero de plaza:&nbsp;&nbsp;</label><label
                                    id="num_plaza_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Tipo de plaza:&nbsp;&nbsp;</label><label
                                    id="tipo_plaza_dt">
                                </label>
                            </div>
                        </div>


                        <h6 style="color:#BC955C;font-weight: bold"><i class="fa fa-info-circle"></i> Informaci&oacuten
                            de centro de trabajo asociado a la
                            plaza.</h6>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Clave centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="cve_centro_trabajo_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Entidad de centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="entidad_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">C&oacutedigo postal de centro de
                                    trabajo:&nbsp;&nbsp;</label><label id="codigo_postal_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-12">
                                <label style="font-weight: bold">Unidad responsable de centro de
                                    trabajo:&nbsp;&nbsp;</label><label id="unidad_respo_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-12">
                                <label style="font-weight: bold">Nombre de centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="nombre_centro_trabajo_dt">
                                </label>
                            </div>
                        </div>


                        <h6 style="color:#BC955C;font-weight: bold"><i class="fa fa-info-circle"></i> Informaci&oacuten
                            de empleado asociado a la plaza.
                        </h6>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Curp de empleado:&nbsp;&nbsp;</label><label
                                    id="curp_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Rfc de empleado:&nbsp;&nbsp;</label><label id="rfc_dt">
                                </label>
                            </div>

                            <div class="form-group col-md-12">
                                <label style="font-weight: bold">Nombre de empleado:&nbsp;&nbsp;</label><label
                                    id="nombre_dt">
                                </label>
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>
                        <div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i>
                            Informaci&oacuten de los &uacuteltimos movimientos de la plaza
                        </div>

                        <table class="table table-striped" id="tabla_historia_plaza_empleado" style="width:100%">
                        </table>

                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!--
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
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
                            <label>Rfc</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Rfc">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido paterno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Apellido paterno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Curp</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido materno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Apellido materno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>N&uacutemero de seguro social</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nss" name="nss" placeholder="Número de seguro social">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>
-->