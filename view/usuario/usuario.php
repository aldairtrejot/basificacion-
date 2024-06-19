<?php include("../validar_rol.php") ?>
<?php include('../../validar_sesion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <script src="../../js/usuario/usuario.js"></script>

    <style>
        a.dropdown-item:hover { background-color: #fbf4e8;;}
        
    </style>
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/usuario/listarUsuario.php") ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Control de Usuarios</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Control Usuarios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <p>La sig. tabla muestra informacion de control de usuarios.</p>
            <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo 'usuarioAgregar.php' ?>">Agregar</a>
                    </div>
                </div>
                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">Nick</th>
                            <th style="color: white;">Nombre</th>
                            <th style="color: white;">Status</th>
                            <th style="color: white;">Rol</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($usEx) {
                            if (pg_num_rows($usEx) > 0) {
                                while ($obj = pg_fetch_object($usEx)) { ?>
                                    <tr>
                                        <td>
                                        <div class=" btn-group">
                                                <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-cog" style="font-size: 1.4rem; color:#cb9f52;"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo "usuarioEditar.php?D-F=" . base64_encode($obj->id_user) ?>">Modificar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                         data-target="<?php echo '#modal-' . $obj->id_user ?>">Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                             <div class="modal fade" id="<?php echo 'modal-' . $obj->id_user ?>" tabindex="-1" role="dialog"
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
                                                            href="<?php echo "../../php/usuario/eliminarUsuario.php?D-F=" . base64_encode($obj->id_user) ?>">Confirmar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->

                                        </td>
                                        <td>
                                            <?php echo $obj->nick ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->nombre ?>
                                        </td>
                                        <td>
                                            <?php echo statusFunction($obj->status) ?>
                                        </td>
                                        <td>
                                            <?php echo rolFunction($obj->id_rol) ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p>Sin Resultados</p>";
                        }
                        ?>
                        </tbody>
                    </table>

                        <?php include('../../ajuste-menu.php') ?>
                        <?php include('../../footer-librerias.php') ?>

            </div>
        </div>
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