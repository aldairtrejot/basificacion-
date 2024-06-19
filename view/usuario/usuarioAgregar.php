<?php include("../../validar_rol.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/usuario/usuarioAgregar.js"></script>
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/usuario/listarUsuario.php") ?>
    <?php include("../../php/usuario/usuarioSQL.php") ?>
    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar usuario</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Agregar Usuario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingrese los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/usuario/agregarUsuario.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nick</label><label style="color:red">*</label><br>
                                    <input type="text" onkeyup="validarCaracteresNick();" class="form-control"
                                        id="nickA" name="nickA" placeholder="Nick">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnickA">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre</label><label style="color:red">*</label><br>
                                    <input onkeyup="validarCaracteresNombre();" id="nombreA" name="nombreA" type="text"
                                        class="form-control" placeholder="Nombre">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnombreA">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Password</label><label style="color:red">*</label><br>
                                <input id="pwA" onkeyup="validarCaracteresPW1()" name="pwA" type="password"
                                    class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpwA">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirmar Password</label><label style="color:red">*</label><br>
                                <input id="psA2" onkeyup="validarCaracteresPW2()" name="psA2" type="password"
                                    class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpsA2">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Rol</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" id="rolA"
                                        name="rolA" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($roEx) {
                                            if (pg_num_rows($roEx) > 0) {
                                                while ($row1 = pg_fetch_object($roEx)) {
                                                    echo '<option value="' . $row1->id_rol . '">' . $row1->id_rol . " - " . $row1->nombre . '</option>';
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

                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;" href="usuario.php">Cancelar</a>
                            <button type="submit" onclick="return validate();" class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> "/>
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>
            


</body>

<script>

    function validate(){
        console.log(validarNick());
        if (validar() && validarNick()){
            return true;
        } else {
            return false;
        }
    }

    function validarNick(){
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        let bool = false;
        if (validateNick(nick.value)){
            Swal.fire({
            title: "¡El campo Nick ya existe!",
            text: "Verifique que las contrasenas seas iguales",
            icon: "error"
        });
        } else {
            bool = true;
        }
        return bool;
    }

    //Se obtienen los datos asi como los del mensaje
    function validarCaracteresNick() {
        let rnick = document.getElementById("rnickA"); //Se obtiene el valor de msj nick
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        nick.value = nick.value.toUpperCase(); //La funcion convierte a mayusculas el campo nick
        if (mensajeDD(nick.value, 5, 10) === "") {
            if (validateNick(nick.value)){
                rnick.value = "*El campo Nick ya existe";
            } else {
                rnick.value = "";
            }
        } else {
            rnick.value = mensajeDD(nick.value, 5, 10);
        }
    }

    function validateNick(nick) {
        let arrayJS = JSON.parse(document.getElementById('row').value);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == nick) {
                bool = true;
                i++;
            }
        }
        return bool;
    }


</script>
<?php  include("libFooter.php"); ?>
</html>