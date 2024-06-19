<body>
    <?php include '../../nav-menu.php' ?>

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid bg-image">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-10 align-self-center">
                            <h2 style="color:#235B4E" class="page-title fs-4">Hospital Regional de Alta Especialidad -
                                Empleados
                            </h2>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="col-2 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../../Admin/MiPerfil/index.php" style="color:#cb9f52;">Inicio</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-6">
                            <div class="row">
                                <div class="col-1">
                                    <div class="form-inline">
                                        <button onclick="agregarEditarDetalles(null)"
                                            class=" btn btn-light boton-con-imagen" id="agregar_empleado">
                                            <img src="../../../../assets/icons/Empleado/agregar_empleado.png"
                                                alt="Imagen del botón">
                                            <span class="hide-menu" style="font-weight: bold;">&nbsp;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 search-container">
                                    <input onkeyup="buscarEmpleado();" id="buscar" type="text" placeholder="Buscar..."
                                        class="form-control mr-sm-2 search-input">
                                    <span class="search-icon"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>


                        <!--
                        <div class="col-3">
                            <div class="form-inline">
                                <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i
                                        class="fa fa-user-plus"></i>
                                    <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar empleado</span>
                                </button>
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-inline">
                                <button class=" btn btn-light boton-con-imagen" id="a1gregar12">
                                    <img src="../../../../assets/icons/hospital.gif" alt="Imagen del botón">
                                </button>
                            </div>
                        </div>
-->

                        <!--
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                        onkeyup="buscarEmpleado();" aria-label="Search">
                    -->


                    </div>
                    <br>


                    <table class="table table-striped table-small-rows" id="tabla_empleados" style="width:100%">
                    </table>
                    <div class="position-absolute top-50 start-50">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idEmpleadotable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                    <br>

                </div>
            </div>
        </div>

        <?php include ('Librerias.php') ?>
        <?php include ('../../footer-librerias.php') ?>
    </div>
</body>

<script>


</script>