<?php
    include("../../php/DatosEmpleadoC/Listar.php");
    $id_tbl_empleados = base64_decode($_GET['D-F']); 
    $id_tbl_datos_empleado = base64_decode($_GET['D-F2']);
    $id_tbl_control_plazas = $_GET['D-F3'];
    $id_tbl_centro_trabajo = ($_GET['RP']);
    $rowe = listadoDatosEmpleadosPk($id_tbl_datos_empleado); 

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

        <div class="page-wrapper" >

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar datos de empleado</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="Listar.php" style="color:#cb9f52;">Empleados</a>
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
                        <form method="POST" action="../../php/DatosEmpleadoC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                            <input type="hidden" name="id_tbl_datos_empleado" value="<?php echo $id_tbl_datos_empleado?>">
                            <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label >Pa&iacutes de nacimiento</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="pais_nacimiento" value="<?php echo $rowe['pais_nacimiento']?>" required maxlength="30">
                                </div>

                            

                            <div class="form-group col-md-6">
                                    <label for="inputCity">Genero</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_genero" required>
                                        <?php
                                        echo '<option value="' . $rowe['id_cat_genero'] . '">' . catGeneroPk($rowe['id_cat_genero']) . '</option>';
                                        $listado = listadoGenero();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_genero'] != $row->id_cat_genero){
                                                    echo '<option value="' . $row->id_cat_genero . '">' . $row->genero . '</option>';
                                                    }
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
                                        <?php
                                        echo '<option value="' . $rowe['id_cat_estado_civil'] . '">' . catalogoCivilPk($rowe['id_cat_estado_civil']) . '</option>';
                                        $listado = listadoCivil();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_estado_civil'] != $row->id_cat_estado_civil){
                                                    echo '<option value="' . $row->id_cat_estado_civil . '">' . $row->estado_civil . '</option>';
                                                    }
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
                                        <?php
                                        echo '<option value="' . $rowe['id_cat_nivel_estudios'] . '">' . catalogoNivelEstudiosPk($rowe['id_cat_nivel_estudios']) . '</option>';
                                        $listado = listadoNivelEstudios();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_nivel_estudios'] != $row->id_cat_nivel_estudios){
                                                    echo '<option value="' . $row->id_cat_nivel_estudios . '">' . $row->nivel_estudios . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            <button type="submit" class="btn btn-light"
                            href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados).'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>
<?php  include("libFooter.php"); ?>
</html>