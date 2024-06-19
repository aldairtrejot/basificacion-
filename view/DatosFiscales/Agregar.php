<?php include ("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include ("libHeader.php"); ?>
</head>

<body>
    <?php include ('../nav-menu.php') ?>
    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Informaci&oacuten F&iacutescal</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Datos Fiscales</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/DatosFiscalesC/Agregar.php">
                            <div class="form-row">
                                <!-- INPUT RFC -->
                                <div class="form-group col-md-6">
                                    <label>FRC</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC"
                                        required maxlength="13">
                                </div>
                                <!-- INPUT CURP -->
                                <div class="form-group col-md-6">
                                    <label>CURP</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP"
                                        required maxlength="18">
                                </div>
                                <!-- INPUT REGISTRO PATRONAL -->
                                <div class="form-group col-md-6">
                                    <label>Registro Patronal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" id="registro_patronal"
                                        name="registro_patronal" placeholder="Registro Patronal" required
                                        maxlength="100">
                                </div>
                                <!-- CODIGO POSTAL -->
                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo Postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" pattern="[0-9]{1,5}" id="codigo_postal"
                                        name="codigo_postal" placeholder="Codigo Postal" required maxlength="5">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nombre / Raz&oacuten Social</label>
                                    <input type="text" class="form-control" id="nombre_razon_social"
                                        name="nombre_razon_social" placeholder="Nombre - Razon Social" 
                                        maxlength="150">
                                </div>

                                <!-- CODIGO ID REGIMEN FISCAL -->
                                <div class="form-group col-md-6">
                                    <label for="inputCity">R&eacutegimen F&iacutescal</label><label
                                        style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_regimen_fiscal" name="id_cat_regimen_fiscal" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_regimen_fiscal . '">' . $row->regimen_fiscal . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <a class="btn btn-secondary"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include ('../../ajuste-menu.php') ?>
            <?php include ('../../footer-librerias.php') ?>



</body>

<script>

    function validate() {
        console.log(validarNick());
        if (validar() && validarNick()) {
            return true;
        } else {
            return false;
        }
    }

    function validarNick() {
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        let bool = false;
        if (validateNick(nick.value)) {
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
            if (validateNick(nick.value)) {
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
<?php include ("libFooter.php"); ?>

</html>