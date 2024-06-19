<?php include ("../validar_rol.php") ?>
<?php

include ("../../conexion.php");
include ("../../php/usuario/listarUsuario.php");

$id_user = base64_decode($_GET['D-F']);
$listQuery = pg_query($connectionDBsPro, "SELECT * FROM users WHERE id_user='$id_user'");

if ($listQuery) {
    $row = pg_fetch_array($listQuery);
    $id_userN = $row["id_user"];
    $id_rolN = $row["id_rol"];
    $nickDBN = $row["nick"];
    $nombreN = $row["nombre"];
    $passDBN = $row["password"];
    $statusN = $row["status"];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/usuario/usuarioEditar.js"></script>
    <?php include ("libHeader.php"); ?>
</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar usuario</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="usuario.php" style="color:#cb9f52;">Control Usuarios</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar Usuario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/usuario/editarUsuario.php">
                            <div class="form-row">
                                <!--- Se oculta el id de usuario-->
                                <input type="hidden" id="id_user" name="id_user" value="<?php echo $id_userN ?>" />
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nick</label><label style="color:red">*</label><br>
                                    <input type="text" value="<?php echo $nickDBN ?>" class="form-control" id="nickN"
                                        name="nickN" placeholder="Nick">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre</label><label style="color:red">*</label><br>
                                    <input id="nombreN" name="nombreN" type="text" class="form-control"
                                        placeholder="Nombre" value="<?php echo $nombreN ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Password</label><label style="color:red">*</label><br>
                                <input id="pwN" name="pwN" type="password" class="form-control" placeholder="******">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirmar Password</label><label
                                    style="color:red">*</label><br>
                                <input id="confirmarpwN" type="password" class="form-control" placeholder="******">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Rol</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" id="rolN"
                                        name="rolN">
                                        <option value="<?php echo $id_rolN ?>" selected>
                                            <?php echo rolFunction($id_rolN) ?>
                                        </option>
                                        <?php

                                        if ($roEx) {
                                            if (pg_num_rows($roEx) > 0) {
                                                while ($row1 = pg_fetch_object($roEx)) {
                                                    if ($id_rolN != $row1->id_rol) {
                                                        echo '<option value="' . $row1->id_rol . '">' . $row1->nombre . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled"
                                        checked disabled>
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                        Activo</label><label style="color:red">*</label><br>
                                </div>

                            </div>

                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="usuario.php">Cancelar</a>
                            <button type="submit" onclick="return validar();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                class="btn btn-light">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include ('../../ajuste-menu.php') ?>
            <?php include ('../../footer-librerias.php') ?>

</body>
<?php include ("libFooter.php"); ?>

</html>