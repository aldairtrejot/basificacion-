<?php include("../validar_rol.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/rol/listarRol.php") ?>

    <div id="main-wrapper">

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h2 class="page-title">Control de roles</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Control Role</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


            <div class="container-fluid">
            <p>La sig. tabla muestra informacion de control de roles.</p>
                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Nombre</th>
                            <th style="color: white;">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if ($roEx) {
                            if (pg_num_rows($roEx) > 0) {
                                while ($obj = pg_fetch_object($roEx)){?>
                                    <tr>
                                    <td><?php  echo $obj->nombre ?></td>
                                    <td><?php  echo $obj->descripcion ?></td>
                                </tr>
                                    <?php
                                }
                            } else
                         echo "<p></p>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>

<script>
    $(document).ready(function () {
        $('#t-usuarios').DataTable({
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

<?php  include("libFooter.php"); ?>
</html>