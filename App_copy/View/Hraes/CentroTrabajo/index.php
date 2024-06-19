<body>

    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid bg-image">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-10 align-self-center">
                            <h2 style="color:#235B4E" class="page-title">Hospital Regional de Alta Especialidad - Centro
                                de trabajo</h2>
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
                                        <li class="breadcrumb-item active" aria-current="page">Centros de trabajo</li>
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
                                            class=" btn btn-light boton-con-imagen" id="agregar_clue">
                                            <img src="../../../../assets/icons/Clue/clues_agregar.png"
                                                alt="Imagen del botón">
                                            <span class="hide-menu" style="font-weight: bold;">&nbsp;</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="col-6 search-container">
                                    <input onkeyup="buscarCentro();" id="buscar" type="text" placeholder="Buscar..."
                                        class="form-control mr-sm-2 search-input">
                                    <span class="search-icon"><i class="fas fa-search"></i></span>
                                </div>
                            </div>



                        </div>

                        <!--
                        <div class="col-9">
                            <div class="form-inline">
                                <button id="button_agregar_centro_trabajo" onclick="agregarEditarDetalles(null)"
                                    class="btn btn-light"><i class="fas fa-plus"></i>
                                    <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar centro de
                                        trabajo</span>
                                </button>
                            </div>
                        </div>
-->


                        <!--
                        <div class="col-3">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                                onkeyup="buscarCentro();" aria-label="Search">
                        </div>
-->
                    </div>

                    <p></p>

                    <p></p>

                    <table class="table table-striped table-small-rows" id="tabla_centro_trabajo" style="width:100%">
                    </table>

                    <div class="position-absolute top-50 start-50">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idtable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                    <br>


                    <?php include 'AgregarEditar.php' ?>

                </div>
            </div>
        </div>

        <script src="../../../../js/Hraes/CentroTrabajo/CentroTrabajo.js"></script>
        <script src="../../../../js/Hraes/CentroTrabajo/validar.js"></script>
        <script src="../../../../js/Hraes/CentroTrabajo/Busqueda.js"></script>
        <?php include ('../../footer-librerias.php') ?>
</body>