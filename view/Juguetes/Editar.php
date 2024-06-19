<?php
include ('../../php/ControlJuguetesC/Listar.php');
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_juguetes = base64_decode($_GET['D-F2']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
$rowe = listarCtrlJuguetesById($id_ctrl_juguetes);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include ("libHeader.php"); ?>
    <script src="../../js/messages.js"></script>
    <script src="../../js/Central/ControlJuguetes/ControlJuguetes.js"></script>
</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php"); ?>
    <?php include ('../../php/DependientesEconomicosC/Listar.php'); ?>
    <?php include ('../../php/CatFechaJuguetesC/Listar.php'); ?>
    <?php include ('../../php/CatEstatusJuguetesC/Listar.php'); ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">Modificar un dependiente ec&oacutenomico del programa</h2>
                <div class="row">
                    <div class="col-5 align-self-center">

                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Juguetes</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlJuguetesC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" id="id_tbl_empleados"
                                value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_ctrl_juguetes" id="id_ctrl_juguetes"
                                value="<?php echo $id_ctrl_juguetes ?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo"
                                value="<?php echo $id_tbl_centro_trabajo ?>">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Seleccione un Dependiente</label><label
                                        style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_tbl_dependientes_economicos" name="id_tbl_dependientes_economicos"
                                        required>
                                        <?php
                                        echo '<option value="' . $rowe['id_tbl_dependientes_economicos'] . '">' . listarParaJuguetesNombre($rowe['id_tbl_dependientes_economicos']) . '</option>';
                                        $listado = listadoDependientesEconomicosId($id_tbl_empleados);
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_tbl_dependientes_economicos'] != $row->id_tbl_dependientes_economicos) {
                                                        echo '<option value="' . $row->id_tbl_dependientes_economicos . '">' . listarParaJuguetesNombre($row->id_tbl_dependientes_economicos) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Seleccione la Fecha</label><label
                                        style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_fecha_juguetes" name="id_cat_fecha_juguetes" required>
                                        <?php
                                        echo '<option value="' . $rowe['id_cat_fecha_juguetes'] . '">' . listadoFechaJuguetesByFecha($rowe['id_cat_fecha_juguetes']) . '</option>';
                                        $listado = listadoFechaJuguetes();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_fecha_juguetes'] != $row->id_cat_fecha_juguetes) {
                                                        echo '<option value="' . $row->id_cat_fecha_juguetes . '">' . $row->fecha . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Seleccione un estatus</label><label
                                        style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_estatus_juguetes" name="id_cat_estatus_juguetes" required>
                                        <?php
                                        echo '<option value="' . $rowe['id_cat_estatus_juguetes'] . '">' . listadoEstatusJuguetesPk($rowe['id_cat_estatus_juguetes']) . '</option>';
                                        $listado = listadoEstatusJuguetesAll();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_estatus_juguetes'] != $row->id_cat_estatus_juguetes) {
                                                        echo '<option value="' . $row->id_cat_estatus_juguetes . '">' . $row->estatus . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>
            <input type="hidden" id="ctrlJuguetesLista"
                value="<?php echo htmlspecialchars(listarCtrlJuguetesByJson()); ?> " />
            <?php include ('../../ajuste-menu.php') ?>
            <?php include ('../../footer-librerias.php') ?>



</body>

<script>
    /**
     * El script permite validar que solo exista un dependiente dentro de la tabla ctrl_juguetes
     */
    function validateE() {
        let id_tbl_dependientes_economicos = document.getElementById("id_tbl_dependientes_economicos").value;
        let id_cat_fecha_juguetes = document.getElementById("id_cat_fecha_juguetes").value;
        let id_ctrl_juguetes = document.getElementById("id_ctrl_juguetes").value;
        let ctrlJuguetesLista = JSON.parse(document.getElementById('ctrlJuguetesLista').value);
        bool = false;
        if (validateDependienteInJuguetesEdit(ctrlJuguetesLista, id_cat_fecha_juguetes, id_tbl_dependientes_economicos,id_ctrl_juguetes)) {
            messajeError("Ya se encuentra el dependiente.");
        } else {
            bool = true;
        }
        return bool;
    }

</script>

<?php include ("libFooter.php"); ?>

</html>