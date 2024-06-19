<?php
include("../../php/ControlCuentaClabeC/Listar.php");
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/messages.js"></script>
    <script src="../../js/estatus/validarEstatus.js"></script>
    <?php include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include('../../php/CatEstatusC/listar.php'); ?>
    <?php include('../../php/CatBancoC/listar.php'); ?>
    <?php include('../../php/CatFormatoPagoC/listar.php'); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar forma de pago</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Cuenta Clabe</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle" style="font-size: .85rem; color:#cb9f52;"></i>
                    &nbsp;&nbsp;Solo una forma de pago puede estar activa.
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlCuentaClabeC/Agregar.php">
                            <div class="form-row">

                                <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados ?>">
                                <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                                <input type="hidden" name="id_tbl_control_plazas"
                                    value="<?php echo $id_tbl_control_plazas ?>">

                                <div class="form-group col-md-6">
                                    <label>Cuenta clabe</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" placeholder="Cuenta clabe"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_estatus" id="id_cat_estatus" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Banco</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" name="id_cat_banco"
                                        required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoBanco();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_banco . '">' . $row->identificador . ' - ' . $row->nombre . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Formato de pago</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_formato_pago" id="id_cat_formato_pago" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoFormatoPago();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_formato_pago . '">' . $row->forma_pago . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


                            <a class="btn btn-secondary"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="list_cat_estatus"
                value="<?php echo htmlspecialchars(estatusCuentaCv($id_tbl_empleados)); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>




</body>

<script>
    /**
     * El script permite validar que solo exista un status activo
     */
    function validateE() {
        //let id_cat_formato_pago = document.getElementById("id_cat_formato_pago").value;
        let id_cat_estatus = document.getElementById("id_cat_estatus").value;
        let arraJS = JSON.parse(document.getElementById('list_cat_estatus').value);
        bool = false;
        if (validateEstatusAdd(id_cat_estatus, arraJS)) {
            messajeError("Solo una cuenta clabe puede estar activa.");
        } else {
            bool = true;
        }
        return bool;
    }
</script>

<?php include("libFooter.php"); ?>

</html>