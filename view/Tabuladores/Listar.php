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
    <?php include("libHeader.php"); ?>

</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include('../../php/TabuladoresC/Listar.php') ?>
    <?php include('../../php/CatNivelesC/listar.php') ?>
    <?php include('../../php/CatTipoContratacionC/listar.php') ?>
    <?php include('../../php/CatPuestoC/listar.php') ?>
    <?php include('../../php/CatZonaTabuladoresC/listar.php') ?>
    <?php include('../../php/CatRubrosTabuladoresC/listar.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Tabuladores</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Tabuladores</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>La sig. tabla muestra informaci&oacuten de tabuladores.</p>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"
                        style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="<?php echo 'Agregar.php'?>">Agregar</a>
                    </div>
                </div>
                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">Sbe</th>
                            <th style="color: white;">Cg</th>
                            <th style="color: white;">Sb</th>
                            <th style="color: white;">Cs</th>
                            <th style="color: white;">Cp</th>
                            <th style="color: white;">Ab</th>
                            <th style="color: white;">Aga</th>
                            <th style="color: white;">Bmr</th>
                            <th style="color: white;">Cbmr</th>
                            <th style="color: white;">Ad</th>
                            <th style="color: white;">Adm</th>
                            <th style="color: white;">Psm</th>
                            <th style="color: white;">Asx</th>
                            <th style="color: white;">Sh</th>
                            <th style="color: white;">Fecha inicial</th>
                            <th style="color: white;">Fecha final</th>
                            <th style="color: white;">Niveles</th>
                            <th style="color: white;">Tipo de contrataci&oacuten</th>
                            <th style="color: white;">Puesto</th>
                            <th style="color: white;">Zona tabulares</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listado = listadoTabuladore();
                        if ($listado) {
                            if (pg_num_rows($listado) > 0) {
                                while ($obj = pg_fetch_object($listado)) { ?>
                                    <tr>
                                        <td>

                                            <!-- Button more acctions -->
                                            <div class=" btn-group">
                                            <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-cog" style="font-size: 1.4rem; color:#cb9f52;"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?php echo "Editar.php?D-F=" . base64_encode($obj->id_tbl_tabuladores) ?>">Modificar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="<?php echo '#modal-' . $obj->id_tbl_tabuladores ?>">Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                            <div class="modal fade" id="<?php echo 'modal-' . $obj->id_tbl_tabuladores ?>"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">¿Desea continuar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            La acci&oacuten eliminar no se puede rehacer.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                                            href="<?php echo "../../php/TabuladoresC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_tabuladores) ?>">Confirmar</a>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->
                                        </td>
                                        <td>
                                            <?php echo $obj->sbe ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->cg ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->sb ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->cs ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->cp?>
                                        </td>
                                        <td>
                                            <?php echo $obj->ab?>
                                        </td>
                                        <td>
                                            <?php echo $obj->aga?>
                                        </td>
                                        <td>
                                            <?php echo $obj->bmr?>
                                        </td>
                                        <td>
                                            <?php echo $obj->cbmr?>
                                        </td>
                                        <td>
                                            <?php echo $obj->ad?>
                                        </td>
                                        <td>
                                            <?php echo $obj->adm?>
                                        </td>
                                        <td>
                                            <?php echo $obj->psm?>
                                        </td>
                                        <td>
                                            <?php echo $obj->asx?>
                                        </td>
                                        <td>
                                            <?php echo$obj->sh?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_ini?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_fin?>
                                        </td>
                                        <td>
                                            <?php echo catalogoNivelesPk($obj->id_cat_niveles)?>
                                        </td>
                                        <td>
                                            <?php echo catalogoContratacionPk($obj->id_cat_tipo_contratacion) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoPuestoPk($obj->id_cat_puesto)?>
                                        </td>
                                        <td>
                                            <?php echo catalogoZonaPk($obj->id_cat_zona_tabuladores)?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p>Sin Resultados</p>";
                        }
                        ?>

                        <?php include('../../ajuste-menu.php') ?>
                        <?php include('../../footer-librerias.php') ?>

            </div>
        </div>
</body>

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
<?php include("libFooter.php"); ?>

</html>