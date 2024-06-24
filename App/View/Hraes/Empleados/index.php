<?php include '../../nav-menu.php' ?>

<!--
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">
-->

<style>
    .bootstrap-select:hover .dropdown-toggle {
      background-color: #f8f9fa; /* Cambia aquí el color cuando el cursor está encima */
      /*border-color: red; /* Cambia aquí el color del borde cuando el cursor está encima */
    }

  </style>

<div class="container-fluid bg-image nav-padding">
    <br>
    <div class="card border-light shadow-lg">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col padding-left-0">
                        <h4>Basificaci&oacuten de entidades</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <div class="row div-spacing">
                <div class="col-9">
                    <h2 class="card-title tittle-card-index">Empleados</h2>
                </div>
                <div class="col-3 search-container">
                    <input onkeyup="buscarEmpleado();" id="buscar" type="text" placeholder="Buscar..."
                        class="form-control mr-sm-2 search-input">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <div class="row div-spacing">
                <div class="col-9">
                    <div class="form-inline">
                        <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i
                                class="fa fa-plus icon-size-add"></i>
                            <span class="hide-menu text-button-add">&nbsp;Agregar empleado</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table class="table table-bordered" id="tabla_empleados" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-right">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idEmpleadotable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'AgregarEditarR.php' ?>
<script src="../../../../js/Hraes/Empleados/Empleados.js"></script>
<script src="../../../../js/Hraes/Empleados/validar.js"></script>
<script src="../../../../js/Hraes/Empleados/Busqueda.js"></script>
<?php include '../../librerias.php' ?>
<?php include 'AgregarEditar.php' ?>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
-->










<!--
<body>
    <?php //include '../../nav-menu.php' ?>

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

        <?php // include ('Librerias.php') ?>
        <?php // include ('../../footer-librerias.php') ?>
    </div>
</body>
-->