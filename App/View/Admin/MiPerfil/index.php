<body>

    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid bg-image">
                <div class="page-breadcrumb">
                    <h2 class="page-title">Sitema Integral de Recursos Humanos</h2>
                    <div class="row">
                        <div class="col-5 align-self-center">

                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!--
                                        <li class="breadcrumb-item">
                                            <a href="" style="color:#cb9f52;">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
-->
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <input type="hidden" id="id_user" value="<?php echo $id_user; ?>" />

                <div class="row">
                    <div class="col-6">
                        <div class="container-fluid">
                            <div class="card">
                                <h5 style="color:white; background:#235B4E" class="card-header">Mi perfil</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Datos de usuario</h5>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label style="font-weight: bold">Usuario:&nbsp;&nbsp;</label><label
                                                id="usuario_usuario">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label style="font-weight: bold">Nombre:&nbsp;&nbsp;</label><label
                                                id="usario_nombre">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label style="font-weight: bold">Estatus:&nbsp;&nbsp;</label>Activo<label
                                                id="nombre_dt">
                                            </label>
                                        </div>

                                    </div>

                                    <input type="hidden" id="pw" />

                                    <div class="modal-footer">
                                        <!--
                                        <button type="button" style="background-color:  #235B4E; color: white"
                                            class="btn btn-success" onclick="modalEditPw();"><i class="fa fa-edit"
                                                style=""></i> Modificar contraseña</button>
                                        <input type="hidden" id="pw" />
-->

                                        <button onclick="modalEditPw();" class="btn btn-light boton-con-imagen_table">
                                            <img src="../../../../assets/icons/editar.png" alt="Imagen del botón">
                                            Modificar contraseña
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIN MODAL MODIFICAR PW -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" id="modificar_pw">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#235B4E">
                        <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_plazas"
                                style="font-weight: bold;color:white"></label> Modificar contraseña.</h5>
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Contraseña anterior</label><label style="color:red">*</label>
                                <input minlength="" type="password" class="form-control" id="pw_anterior"
                                    placeholder="Contraseña anterior">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nueva contraseña</label><label style="color:red">*</label>
                                <input maxlength="15" type="password" class="form-control" id="pw_nueva"
                                    placeholder="Nueva contraseña">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Confirmar contraseña</label><label style="color:red">*</label>
                                <input maxlength="15" type="password" class="form-control" id="pw_confirmar"
                                    placeholder="Confirmar contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-light boton-con-imagen_table"><img
                                src="../../../../assets/icons/cancelar.png" alt="Imagen del botón">Cancelar</button>
                        <button type="button" onclick="return validar();"
                            class="btn btn-light boton-con-imagen_table color-butto-modulo"><img
                                src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL MODIFICAR PW -->

        <?php include ('../../footer-librerias.php') ?>

        <script src="../../../../js/Admin/Perfil/Perfil.js"></script>
</body>