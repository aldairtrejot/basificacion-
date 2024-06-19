<?php
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include ('../../php/CatGeneroC/listar.php');?>
    <?php include ('../../php/CatEstadoCivilC/listar.php');?>
    <?php include ('../../php/CatNivelEstudiosC/listar.php');?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar datos de empleado</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Datos del Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/DatosEmpleadoC/Agregar.php">
                            <div class="form-row">

                                <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                                <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                                <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                                
                                <div class="form-group col-md-6">
                                    <label >Pa&iacutes de nacimiento</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="pais_nacimiento" placeholder="Pais Nacimiento" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Genero</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_genero" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoGenero();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_genero . '">' . $row->genero . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estado civil</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_estado_civil" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoCivil();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_estado_civil . '">' . $row->estado_civil . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Nivel de estudios</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_nivel_estudios" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoNivelEstudios();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_nivel_estudios . '">' . $row->nivel_estudios . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                               
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) .'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



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
<?php  include("libFooter.php"); ?>
</html>