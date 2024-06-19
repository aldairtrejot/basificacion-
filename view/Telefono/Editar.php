<?php
include("../../php/ControlTelefonoC/Listar.php");
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_telefono = base64_decode($_GET['D-F2']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);     
$rowe = listadoTelefonoPk($id_ctrl_telefono);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/messages.js"></script>
    <?php include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include('../../php/CatGeneroC/listar.php'); ?>
    <?php include('../../php/CatEstadoCivilC/listar.php'); ?>
    <?php include('../../php/CatNivelEstudiosC/listar.php'); ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar n&uacutemero telef&oacutenico</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">N&uacutemero Telef&oacutenico</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle" style="font-size: .85rem; color:#cb9f52;"></i>
                    &nbsp;&nbsp;Solo un n&uacutemero telef&oacutenico puede estar activo.
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlTelefonoC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_ctrl_telefono" id="id_ctrl_telefono" value="<?php echo $id_ctrl_telefono ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>N&uacutemero Telef&oacutenico</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="movil"
                                        value="<?php echo $rowe['movil'] ?>" required pattern="[0-9]{1,14}"
                                        maxlength="13">
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
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas .'&RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>
            <input type="hidden" id="list_cat_estatus"
                value="<?php echo htmlspecialchars(estatusTelefono($id_tbl_empleados)); ?> " />

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>

<script>
    /**
     * El script permite validar que solo exista un status activo de los numeros
     * telefonicos que pertenecen al usuario
     */
    function validateE() {
        let id_cat_estatus = document.getElementById("id_cat_estatus").value;
        let id_ctrl_telefono = document.getElementById("id_ctrl_telefono").value;
        bool = false;
        if (validateEstatus(id_cat_estatus, id_ctrl_telefono)) {
            messajeError("Solo un numero telefonico puede estar activo.");
        } else {
            bool = true;
        }
        return bool;
    }

    function validateEstatus(id_estatus, id_ctrl_telefono) {
        let arrayJS = JSON.parse(document.getElementById('list_cat_estatus').value);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == id_estatus && arrayJS[i + 1] != id_ctrl_telefono) {
                bool = true;
                i++;
            }
        }
        return bool;
    }

</script>

<?php include("libFooter.php"); ?>

</html>