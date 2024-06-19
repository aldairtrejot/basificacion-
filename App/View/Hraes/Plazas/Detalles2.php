<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="mostar_detalles_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"></label>Detalles de plaza.
                </h5>
            </div>

            <div class="div-spacing"></div>
            <div class="container">
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a style="font-weight: bold" class="nav-link active text-secondary" id="home-tab"
                                data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i
                                    class="fa fa-archive"></i>
                                Detalles de la plaza.</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-weight: bold" class="nav-link text-secondary" id="profile-tab"
                                data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false"><i class="fa fa-table"></i> Historia de la
                                plaza.</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <h6 class="icon-detail"><i class="fa fa-info-circle"></i>
                                Datos
                                de la plaza.</h6>
                            <div class="row">

                                <div class="col-6">
                                    <label class="text-input-form-bold-label div-spacing">N&uacutemero de
                                        plaza:&nbsp;&nbsp;</label><label class="text-result-normal" id="num_plaza_dt">
                                    </label>
                                </div>

                                <div class="col-6">
                                    <label class="text-input-form-bold-label div-spacing">Tipo de
                                        plaza:&nbsp;&nbsp;</label><label class="text-result-normal" id="tipo_plaza_dt">
                                    </label>
                                </div>
                            </div>


                            <div class="div-spacing"></div>
                            <h6 class="icon-detail"><i class="fa fa-info-circle"></i>
                                Datos
                                de centro de trabajo asociado a la
                                plaza.</h6>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label
                                        class="text-input-form-bold-label div-spacing">Clave:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="cve_centro_trabajo_dt">
                                    </label>
                                </div>

                                <div class="form-group col-md-6">
                                    <label
                                        class="text-input-form-bold-label div-spacing">Entidad:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="entidad_dt">
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class="text-input-form-bold-label div-spacing">C&oacutedigo
                                        p&oacutestal:&nbsp;&nbsp;</label><label class="text-result-normal"
                                        id="codigo_postal_dt">
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="text-input-form-bold-label div-spacing">Unidad
                                        responsable:&nbsp;&nbsp;</label><label class="text-result-normal"
                                        id="unidad_respo_dt">
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <label
                                        class="text-input-form-bold-label div-spacing">Nombre:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="nombre_centro_trabajo_dt">
                                    </label>
                                </div>
                            </div>


                            <!--
                            <div class="div-spacing"></div>
                            <h6 class="icon-detail"><i class="fa fa-info-circle"></i>
                                Datos
                                de empleado asociado a la plaza.
                            </h6>

                            <div class="row">
                                <div class="col-6">
                                    <label
                                        class="text-input-form-bold-label div-spacing">Curp:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="curp_dt">
                                    </label>
                                </div>

                                <div class="col-6">
                                    <label class="text-input-form-bold-label div-spacing">Rfc:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="rfc_dt">
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label
                                        class="text-input-form-bold-label div-spacing">Nombre:&nbsp;&nbsp;</label><label
                                        class="text-result-normal" id="nombre_dt">
                                    </label>
                                </div>

                            </div>
-->


                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i>
                                &Uacuteltimos movimientos de la plaza
                            </div>

                            <table class="table table-bordered" id="tabla_historia_plaza_empleado_ix"
                                style="width:100%">
                            </table>

                        </div>

                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" onclick="ocultarModalDetalles();" class="btn btn-success save-botton-modal"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
            </div>

        </div>
    </div>
</div>