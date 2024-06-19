<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <style>
        a.dropdown-item:hover {
            background-color: #fbf4e8;
            ;
        }
    </style>

    <?php include ("libHeader.php"); ?>

</head>

<body onload="messageInfo();">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="loader-page"></div>

    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php") //Se incluye la libreria para generar su tabla                         ?>
    <?php include ("../../php/CatRegionC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de region                         ?>
    <?php include ("../../php/CatEstatusC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus                         ?>
    <?php include ("../../php/CatEntidadC/Listar.php") ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Centro de Trabajo</h2>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Centro de Trabajo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <p>La siguiente tabla muestra informaci&oacuten de centro de trabajo.</p>
                <div class="btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo 'Agregar.php' ?>">Agregar</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-serarch-plaza">Buscar plaza</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-serarch">Buscar empleado</a>
                    </div>

                    <div class="form-group col-md-20">
                        <input type="text" class="form-control" onkeyup="searchCentrosTrabajo();" id="idCentroTrabajo"
                            name="curp" placeholder="Buscar">
                    </div>

                </div>



                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">Clave de Centro de Trabajo</th>
                            <th style="color: white;">Nombre</th>
                            <th style="color: white;">Pa&iacutes</th>
                            <th style="color: white;">Entidad</th>
                            <th style="color: white;">Colonia</th>
                            <th style="color: white;">C&oacutedigo Postal</th>
                            <th style="color: white;">N&uacutem. Exterior</th>
                            <th style="color: white;">N&uacutem. Interior</th>
                            <th style="color: white;">Latitud</th>
                            <th style="color: white;">Longitud</th>
                            <th style="color: white;">Regi&oacuten</th>
                            <th style="color: white;">Estatus</th>
                        </tr>
                    </thead>

                </table>
                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

            </div>
        </div>


        <!-- Modal template-->
        <div style="display: none" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>



        <!-- Modal AGREGAR PRODUCTOS-->
        <div class="modal fade bd-example-modal-lg" id="modal-serarch" tabindex="-1" role="dialog"
            aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Buscar empleado</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <label>Ingresa CURP / RFC </label><label style="color:red">*</label>
                        <input type="text" class="form-control" onkeyup="search();" id="idSearch" name="curp"
                            placeholder="CURP / RFC ">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-search">

                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            data-dismiss="modal">Cerrar</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal AGREGAR-->

        <!-- Modal AGREGAR PRODUCTOS-->
        <div class="modal fade bd-example-modal-lg" id="modal-serarch-plaza" tabindex="-1" role="dialog"
            aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Buscar plaza</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <label>Ingresa n&uacutemero de plaza</label><label style="color:red">*</label>
                        <input type="text" class="form-control" onkeyup="searchPlaza();" id="idSearchPlaza" name="curp"
                            placeholder="Num. de plaza">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-search-plaza">

                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            data-dismiss="modal">Cerrar</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal AGREGAR-->




        <input type="hidden" id="messageInfo" value="<?php echo base64_decode($_GET['MS3']); ?>">
</body>

<script>
    function messageInfo() {
        let messageInfo = document.getElementById("messageInfo").value;
        if (messageInfo == 1) {
            messajeError('No es posible eliminar un centro de trabajo con plazas asignadas.');
        }
        iniciarTabla();
        console.log('Iniciar');
    }
</script>

<script>
    function iniciarTabla() {
        let idCentroTrabajo = 0;
        $.ajax({
            type: 'POST',
            url: '../../php/CentroTrabajoC/TablaCentroTrabajo.php',
            data: { idCentroTrabajo: idCentroTrabajo },
            success: function (data) {
                $('#t-usuarios').html(data);
            }
        });
    }
</script>


<script>
    function searchCentrosTrabajo() {
        let idCentroTrabajo = document.getElementById('idCentroTrabajo').value;
        let idCentroTrabajoLength = document.getElementById('idCentroTrabajo').value.length;
        idCentroTrabajo = idCentroTrabajo.trim();
        if (idCentroTrabajoLength >= 10) {
            //$('#t-usuarios').html('listo');
            $.ajax({
                type: 'POST',
                url: '../../php/CentroTrabajoC/TablaCentroTrabajo.php',
                data: { idCentroTrabajo: idCentroTrabajo },
                success: function (data) {
                    $('#t-usuarios').html(data);
                }
            });
        } else if (idCentroTrabajoLength <= 2) {
            iniciarTabla();
        } else {
            $('#t-usuarios').html('Ingrese al menos 10 caracteres');
        }
    }
</script>


<script>
    function searchPlaza() {
        let idSearchPlaza = document.getElementById("idSearchPlaza").value;
        var numberSearch = document.getElementById("idSearchPlaza").value.length;
        idSearchPlaza = idSearchPlaza.trim();
        if (numberSearch >= 6) {
            $.ajax({
                type: 'POST',
                url: '../../php/PlazasC/busqueda.php',
                data: { idSearchPlaza: idSearchPlaza },
                success: function (data) {
                    $('#table-search-plaza').html(data);
                }
            });
        } else {
            $('#table-search-plaza').html('Ingrese mas de 6 caracteres');
        }
    }
</script>

<script>
    function search() {
        let idSearch = document.getElementById("idSearch").value;
        var numberSearch = document.getElementById("idSearch").value.length;
        idSearch = idSearch.trim();
        if (numberSearch >= 10) {
            $.ajax({
                type: 'POST',
                url: '../../php/EmpleadosC/busqueda.php',
                data: { idSearch: idSearch },
                success: function (data) {
                    $('#table-search').html(data);
                }
            });
        } else {
            $('#table-search').html('Ingrese mas de 10 caracteres');
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#t-usuarios').DataTable({
            scrollX: true,
            searching: false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            responsive: "true",
            dom: 'Bfrtilp',
            buttons: [

            ],
        }

        );
    });


</script>
<?php include ("libFooter.php"); ?>

</html>