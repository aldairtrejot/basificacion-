<?php
include("../../php/ControlMediosContactoC/Listar.php");
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_medios_contacto = base64_decode($_GET['D-F2']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
$rowe = listadoMediosContactoPk($id_ctrl_medios_contacto);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include("libHeader.php"); ?>
    <script src="../../js/messages.js"></script>
    <script src="../../js/estatus/validarEstatus.js"></script> 
</head>

<body>
    <?php include('../nav-menu.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar medio de contacto</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Medio de contacto</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle" style="font-size: .85rem; color:#cb9f52;"></i>
                    &nbsp;&nbsp;Solo un contacto puede estar activo.
                </div>

                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlMediosContactoC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                            <input type="hidden" name="id_ctrl_medios_contacto" id="id_ctrl_medios_contacto"
                                value="<?php echo $id_ctrl_medios_contacto ?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Correo electronico</label><label style="color:red">*</label>
                                    <input type="email" class="form-control" required name="correo_electronico"
                                        value="<?php echo $rowe['correo_electronico'] ?>" maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_estatus" id="id_cat_estatus" required>
                                        <?php
                                        include('../../php/CatEstatusC/listar.php');
                                        echo '<option value="' . $rowe['id_cat_estatus'] . '">' . catEstatus($rowe['id_cat_estatus']) . '</option>';
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_estatus'] != $row->id_cat_estatus) {
                                                        echo '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
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
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>
            <input type="hidden" id="list_cat_estatus"
                value="<?php echo htmlspecialchars(estatusMediosCon($id_tbl_empleados)); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>
<script>
    /**
     * El script permite validar que solo exista un status activo
     */
    function validateE() {
        let id_ctrl_medios_contacto = document.getElementById("id_ctrl_medios_contacto").value;
        let id_cat_estatus = document.getElementById("id_cat_estatus").value;
        let arraJS = JSON.parse(document.getElementById('list_cat_estatus').value);
        bool = false;
        if (validateEstatusEdi(id_cat_estatus, id_ctrl_medios_contacto, arraJS)) {
            messajeError("Solo un contacto puede estar activo.");
        } else {
            bool = true;
        }
        return bool;
    }
</script>

<?php include("libFooter.php"); ?>

</html>