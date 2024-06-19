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
    <?php include ('../../php/CatEstatusC/listar.php');?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar contacto</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Contactos de Emergencia</a>
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
                        <form method="POST" action="../../php/ControlContactoEmergenciaC/Agregar.php">

                                <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                                <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                                <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                                
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Nombre</label ><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" placeholder="Nombre" required maxlength="39">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Primer apellido</label ><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" placeholder="Primer Apellido" required maxlength="39"> 
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Segundo apellido</label ><label style="color:red"></label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" placeholder="Segundo Apellido" maxlength="39">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Parentesco</label ><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="parentesco" placeholder="Parentesco" required maxlength="39">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero telefonico</label ><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="movil" placeholder="Numero Telefonico" required maxlength="15" pattern="[0-9]{1,15}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_estatus" required>
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
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados).'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo ?>">Cancelar</a>
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

<?php  include("libFooter.php"); ?>
</html>