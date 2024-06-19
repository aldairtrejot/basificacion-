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

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ("../../php/CatFechaJuguetesC/listar.php") ?>
    <?php include ("../../php/PlazasEmpleadosC/listar.php") ?>
    <?php include ("../../php/CatCargaMasivaC/listar.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ('modal.php') ?>
    <?php include ('modalPagoJuguetes.php') ?>
    <?php include ('modalTemplate.php') ?>
    <?php include ('modalImport.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Carga masiva</h2>
                        <h4 class="page-title">M&oacutedulo de carga masiva</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Carga Masiva</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p></p>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <!--<a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Importar old</a>-->
                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalImportar">Importar</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalDescargas">Descargar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalHistoria">Historia</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Configuracion
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Configuracion de carga masiva</p>
                            <footer class="blockquote-footer"><cite title="Source Title"></cite></footer>
                        </blockquote>
                    </div>
                </div>

                <!-- MODAL CARGA MASIVA -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Carga Masiva (Dependientes
                                    Econ&oacutemicos) - ER<?php echo (listarControlCargaMasivaByMax() + 1) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="../../php/DependientesEcoMC/CargaMasiva.php" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="inputCity">Seleccione la fecha</label><label
                                            style="color:red">*</label><br>
                                        <select class="form-control" aria-label="Default select example"
                                            id="id_cat_fecha_juguetes" name="id_cat_fecha_juguetes" >
                                            <option value="" selected>Seleccione</option>
                                            <?php
                                            //Se incluye la conexion
                                            $listado = listadoFechaJuguetes();
                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_fecha_juguetes . '">' . $row->fecha . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCity">Seleccione el archivo</label><label
                                            style="color:red">*</label><br>
                                        <input class="form-control" type="file" id="formFile" name="archivo" required>
                                    </div>

                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                                <button type="submit" class="btn btn-secondary" onclick="return validateExtension();"
                                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Importar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

            </div>
        </div>

        <div id="myModalExito" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Control de Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 style="color: green">Total de registros agregados:
                            <?php echo base64_decode($_GET['Re']) ?>
                        </h6>
                        <h6 style="color: red">Total de registros erroneos:
                            <?php echo base64_decode($_GET['Rr']) ?>
                        </h6>
                        <br>
                        <table class="table table-striped" id="t-usuarios">
                            <thead>
                                <tr style="background-color: #5c5c5c;">
                                    <th style="color: white;">Id</th>
                                    <th style="color: white;">Estatus</th>
                                    <th style="color: white;">RFC Empleado</th>
                                    <th style="color: white;">CURP Empleado</th>
                                    <th style="color: white;">CURP Menor</th>
                                    <th style="color: white;">Nombre</th>
                                    <th style="color: white;">Apellido Paterno</th>
                                    <th style="color: white;">Apellido Materno</th>
                                    <th style="color: white;">Observaciones</th>
                                    <th style="color: white;">Exel</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $idCtrlCargaMasiva = base64_decode($_GET['MS']);
                                $roEx = pg_query("SELECT * FROM ctrl_error_dependientes_economicos WHERE id_carga_masiva = $idCtrlCargaMasiva");
                                if ($roEx) {
                                    if (pg_num_rows($roEx) > 0) {
                                        while ($obj = pg_fetch_object($roEx)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo "ER$obj->id_carga_masiva" ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->estatus ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->rfc_empleado ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->curp_empleado ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->curp_menor ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->nombre ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->apellido_paterno ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->apellido_materno ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->descripcion ?>
                                                </td>
                                                <td>
                                                    <?php echo $obj->linea_exel ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else
                                        echo "<h6 style='color: green'>Registros Agregados</h6>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



        <input type="hidden" id="active" value="<?php echo base64_decode($_GET['Me']) ?>" />


</body>


<script>
    function validateExtension1() {
        let bool = false;
        let fileExtension = document.getElementById('archivo').files[0].name;

        if (getFileExtension(fileExtension) != 'csv') {
            messajeError("Ingresar solo archivos con extensi\u00f3n .csv");
        } else {
            bool = true;
            //console.log("Exito");
        }
        return bool;
    }

    function getFileExtension(filename) {
        return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
    }
</script>

<script>

    $(document).ready(function () {
        let active = document.getElementById("active").value;
        if (active == "true") {// se activa la funcion
            $('#myModalExito').modal('show');
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#t-usuarios').DataTable({
            scrollX: true,
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