<?php
include("../../php/ControlJefeInmediatoC/Listar.php");
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/messages.js"></script>
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include ('../../php/CatEstatusC/listar.php');?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar jefe inmediato</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Jefe Inmediato</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle" style="font-size: .85rem; color:#cb9f52;"></i>
                    &nbsp;&nbsp;Solo un jefe inmediato puede estar activo.
                    </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlJefeInmediatoC/Agregar.php">
                            <div class="form-row">

                                <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                                <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                                <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                                
                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" placeholder="Nombre" required maxlength="45">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Primer apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" placeholder="Primer Apellido" required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Segundo apellido</label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" placeholder="Segundo Apellido" maxlength="25">
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
                               
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados).'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="list_cat_estatus"
                value="<?php echo htmlspecialchars(estatusJefeIn($id_tbl_empleados)); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



</body>

<script>
    /**
     * El script permite validar que solo exista un status activo
     */
    function validateE() {
        let id_cat_estatus = document.getElementById("id_cat_estatus").value;
        bool = false;
        if (validateEstatus(id_cat_estatus)) {
            messajeError("Solo un jefe inmediato puede estar activo.");
        } else {
            bool = true;
        }
        return bool;
    }

    function validateEstatus(id_estatus) {
        let arrayJS = JSON.parse(document.getElementById('list_cat_estatus').value);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == id_estatus) {
                bool = true;
                i += 2;
            }
        }
        return bool;
    }
    
</script>

<?php  include("libFooter.php"); ?>
</html>