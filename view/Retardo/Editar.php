<?php
include("../../php/ControlRetardoC/Listar.php");
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_retardo = base64_decode($_GET['D-F2']);
$id_tbl_control_plazas = $_GET['D-F2'];
$id_tbl_centro_trabajo = ($_GET['RP']);
$rowe = listadoRetardoPk($id_ctrl_retardo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar Retardo</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Control de Retardos</a>
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
                        <form method="POST" action="../../php/ControlRetardoC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_ctrl_retardo" value="<?php echo $id_ctrl_retardo ?>">
                            <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fecha</label><label style="color:red">*</label>
                                    <input type="date" class="form-control" name="fecha" required value="<?php echo $rowe['fecha']?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Hora de entrada</label><label style="color:red">*</label>
                                    <input type="time" class="form-control" name="hora_entrada" required value="<?php echo horaAdd($rowe['hora_entrada'],$rowe['minuto_entrada'])?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Hora de salida</label><label style="color:red"></label>
                                    <input type="time" class="form-control" name="hora_salida" value="<?php echo horaAdd($rowe['hora_salida'], $rowe['minuto_salida'])?>">
                                </div>
                            </div>


                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3='. $id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>
<?php include("libFooter.php"); ?>

</html>