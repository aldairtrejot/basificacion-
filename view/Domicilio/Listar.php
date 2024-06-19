<?php
include ('../../php/EmpleadosC/Listar.php');
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_datos_empleado = base64_decode($_GET['D-F2']);
$rowe = catEmpleadosId($id_tbl_empleados);
?>

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

<body onload="myCheck()">
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ('../../php/CatEstatusC/listar.php'); ?>
    <?php include ('../../php/ControlDomicilioC/Listar.php'); ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">Domicilio</h2>
                <div class="row">
                    <div class="col-5 align-self-center">
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Datos de Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Domicilio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>Informaci&oacuten de empleado seleccionado.</p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Nombre:
                    <?php echo $rowe['nombre'] . ' ' . $rowe['primer_apellido'] . ' ' . $rowe['segundo_apellido'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">CURP:
                    <?php echo $rowe['curp'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">RFC:
                    <?php echo $rowe['rfc'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Centro de Trabajo:
                    <?php echo claveCentro(base64_decode($id_tbl_control_plazas)) ?>
                </p>
                <br>


                <?php
                $rowx = listadoDomicilioByIdDatosEmpleado($id_tbl_datos_empleado);

                if (!isset($rowx['id_tbl_domicilios'])) {
                    $rowx = listadoIsNull();
                }




                ?>
                <div class="card">
                    <h5 class="card-header">Domicilios</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlDomicilioC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" id="id_tbl_empleados"
                                value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" name="id_tbl_domicilios" id="id_tbl_domicilios"
                                value="<?php echo $rowx['id_tbl_domicilios'] ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo"
                                value="<?php echo $id_tbl_centro_trabajo ?>">
                            <input type="hidden" id="id_tbl_datos_empleado" name="id_tbl_datos_empleado"
                                value="<?php echo $id_tbl_datos_empleado ?>">

                            <div>Direcci&oacuten 1</div>
                            <br>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Entidad</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="entidad1"
                                        value="<?php echo $rowx['entidad1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Municipio</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="municipio1"
                                        value="<?php echo $rowx['municipio1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="colonia1"
                                        value="<?php echo $rowx['colonia1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="codigo_postal1"
                                        value="<?php echo $rowx['codigo_postal1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Calle</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="calle1"
                                        value="<?php echo $rowx['calle1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_exterior1"
                                        value="<?php echo $rowx['num_exterior1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_interior1"
                                        value="<?php echo $rowx['num_interior1'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" name="id_estatus1"
                                        id="id_estatus1" required>
                                        <?php
                                        echo '<option value="' . $rowx['id_estatus1'] . '">' . catEstatus($rowx['id_estatus1']) . '</option>';
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowx['id_estatus1'] != $row->id_cat_estatus) {
                                                        echo '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Si" type="checkbox"
                                            name="esdireccion_fiscal1" id="esdireccion_fiscal1">
                                        <label>Es direcc&oacuten fiscal</label><label style="color:red">*</label>
                                    </div>
                                </div>

                                <!-- Domicilio no fiscal-->
                            </div>
                            <hr>
                            <div>Direcci&oacuten 2</div>
                            <br>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Entidad</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="entidad2"
                                        value="<?php echo $rowx['entidad2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Municipio</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="municipio2"
                                        value="<?php echo $rowx['municipio2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="colonia2"
                                        value="<?php echo $rowx['colonia2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="codigo_postal2"
                                        value="<?php echo $rowx['codigo_postal2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Calle</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="calle2"
                                        value="<?php echo $rowx['calle2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_exterior2"
                                        value="<?php echo $rowx['num_exterior2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_interior2"
                                        value="<?php echo $rowx['num_interior2'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" name="id_estatus2"
                                        id="id_estatus2" required>
                                        <?php
                                        echo '<option value="' . $rowx['id_estatus2'] . '">' . catEstatus($rowx['id_estatus2']) . '</option>';
                                        $listadx = listadoEstatusByAll();
                                        if ($listadx) {
                                            if (pg_num_rows($listadx) > 0) {
                                                while ($row = pg_fetch_object($listadx)) {
                                                    if ($rowx['id_estatus2'] != $row->id_cat_estatus) {
                                                        echo '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Si" type="checkbox"
                                            name="esdireccion_fiscal2" id="esdireccion_fiscal2">
                                        <label>Es direcc&oacuten fiscal</label><label style="color:red">*</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">

                                </div>

                            </div>

                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "../DatosEmpleado/Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Regresar</a>
                            <button type="submit" class="btn btn-light" onclick="return consultarCheck();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>


                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

                <!-- VARIABLES PARA CHECK-->
                <input type="hidden" id="esdireccion_fiscal1_r" value="<?php echo $rowx['esdireccion_fiscal1'] ?>">
                <input type="hidden" id="esdireccion_fiscal2_r" value="<?php echo $rowx['esdireccion_fiscal2'] ?>">

            </div>
        </div>

</body>

<script>
    function myCheck() {
        ///LA FUNCION ACTIVA LOS CHECK DEPENDIENDO SI EN LA VARIABLE TRAE EL SI
        let result = "SI";
        let esdireccion_fiscal1 = document.getElementById('esdireccion_fiscal1');
        let esdireccion_fiscal2 = document.getElementById('esdireccion_fiscal2');
        let esdireccion_fiscal1_r = document.getElementById('esdireccion_fiscal1_r').value.toUpperCase();
        let esdireccion_fiscal2_r = document.getElementById('esdireccion_fiscal2_r').value.toUpperCase();

        if (esdireccion_fiscal1_r == result) {
            esdireccion_fiscal1.click();
        }
        if (esdireccion_fiscal2_r == result) {
            esdireccion_fiscal2.click();
        }

    }


    function consultarCheck() {
        let esdireccion_fiscal2 = document.getElementById('esdireccion_fiscal2');
        let esdireccion_fiscal1 = document.getElementById('esdireccion_fiscal1');
        let result = false;
        if (esdireccion_fiscal2.checked && esdireccion_fiscal1.checked) {
            messajeError("Solo una direcci\u00f3n fiscal puede estar activa.");
        } else {
            result = true;
        }
        return result;
    }

</script>

<?php include ("libFooter.php"); ?>

</html>