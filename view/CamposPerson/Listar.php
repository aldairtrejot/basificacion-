<?php
include ('../../php/EmpleadosC/Listar.php');
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
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
    <?php include ('../../php/ControlCamposPersonC/Listar.php'); ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">Campos personalizados</h2>
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
                                        <a href="#" style="color:#cb9f52;">Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Campos personalizados</li>
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
                $rowx = listadoCamposPerByIdEmpleado($id_tbl_empleados);

                if (!isset($rowx['id_ctrl_campos_pers'])) {
                    $rowx = listadoIsNullByCamposPer();
                }




                ?>
                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlCamposPersonC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" id="id_tbl_empleados"
                                value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" name="id_ctrl_campos_pers" id="id_ctrl_campos_pers"
                                value="<?php echo $rowx['id_ctrl_campos_pers'] ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo"
                                value="<?php echo $id_tbl_centro_trabajo ?>">

                            <div class="form-row">

                                <div class="form-group col-md-4 ">
                                    <label>Porcentaje ahorro solidario</label><label style="color:red">*</label>
                                    <input type="number" class="form-control" name="porcentaje_ahorro_s"
                                        value="<?php echo $rowx['porcentaje_ahorro_s'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>D&iacuteas medio sueldo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="dias_medio_sueldo"
                                        value="<?php echo $rowx['dias_medio_sueldo'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>D&iacuteas sin sueldo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="dias_sin_sueldo"
                                        value="<?php echo $rowx['dias_sin_sueldo'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label>Reintegro faltas y retardos</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="reintegro_faltas_retardo"
                                        value="<?php echo $rowx['reintegro_faltas_retardos'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Porcentaje seguro de vida institucional</label><label
                                        style="color:red">*</label>
                                    <input type="text" class="form-control" name="porcentaje_svi"
                                        value="<?php echo $rowx['porcentaje_svi'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Importe d&iacutea festivo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="importe_festivo"
                                        value="<?php echo $rowx['importe_festivo'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Porcentaje ahorro solidario</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="porcentaje_ahorro_s"
                                        value="<?php echo $rowx['porcentaje_ahorro_s'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label>Importe horas extras</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="importe_horas_ex"
                                        value="<?php echo $rowx['importe_horas_ex'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Importe prima dominical</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="importe_prima_dominical"
                                        value="<?php echo $rowx['importe_prima_dominical'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label>Importe descuentos indebidos</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="importe_descuentos_indevidos"
                                        value="<?php echo $rowx['importe_descuentos_indebidos'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Importe de recuperaci&oacuten de pagos indebidos</label><label
                                        style="color:red">*</label>
                                    <input type="text" class="form-control" name="importe_recuperacion_pagos_indebidos"
                                        value="<?php echo $rowx['importe_recuperacion_pagos_indebidos'] ?>"
                                        maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>D&iacuteas sanci&oacuten administrativa</label><label
                                        style="color:red">*</label>
                                    <input type="text" class="form-control" name="dias_sansion_adma"
                                        value="<?php echo $rowx['dias_sansion_adma'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label>Regimen pensionario</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="regimen_pen"
                                        value="<?php echo $rowx['regimen_pen'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Quinquenio</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="quinquenio"
                                        value="<?php echo $rowx['quinquenio'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>N&uacutemero de hijos</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_hijos"
                                        value="<?php echo $rowx['num_hijos'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>N&uacutemero de d&iacuteas de jornada dominical</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_dias_jornada_dominical"
                                        value="<?php echo $rowx['num_dias_jornada_dominical'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>N&uacutemero de d&iacuteas de guardia festiva</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_dias_guardia_festiva"
                                        value="<?php echo $rowx['num_dias_guardia_festiva'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>N&uacutemero de hijos</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="aplicar_juguetes"
                                        value="<?php echo $rowx['aplicar_juguetes'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Apoyo a titulaci&oacuten</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="apoyo_titulacion"
                                        value="<?php echo $rowx['apoyo_titulacion'] ?>" maxlength="40">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Licencia de manejo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="licencia_manejo"
                                        value="<?php echo $rowx['licencia_manejo'] ?>" maxlength="40">
                                </div>

                            </div>

                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "../Empleados/Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Regresar</a>
                            <button type="submit" class="btn btn-light" 
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>


                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

            </div>
        </div>

</body>

<?php include ("libFooter.php"); ?>

</html>