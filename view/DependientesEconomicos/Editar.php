<?php
    include("../../php/DependientesEconomicosC/Listar.php");
    $id_tbl_empleados = base64_decode($_GET['D-F']); 
    $id_tbl_dependientes_economicos = base64_decode($_GET['D-F2']); 
    $id_tbl_control_plazas = $_GET['D-F3'];
    $id_tbl_centro_trabajo = ($_GET['RP']);
    $rowe = listadoDependientesEconomicosPk($id_tbl_dependientes_economicos); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/messages.js"></script>
    <script src="../../js/Central/Curp/curp.js"></script>
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper" >

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar dependiente</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="#" style="color:#cb9f52;">Dependientes Ec&oacutenomicos</a>
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
                        <form method="POST" action="../../php/DependientesEconomicosC/Editar.php">
                                                    
                            <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                            <input type="hidden" name="id_tbl_dependientes_economicos" value="<?php echo $id_tbl_dependientes_economicos?>">

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label >CURP</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" id="curp"
                                        name="curp" value="<?php echo $rowe['curp']?>" required maxlength="18">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" value="<?php echo $rowe['nombre']?>" required maxlength="35">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Apellido paterno</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="apellido_paterno" value="<?php echo $rowe['apellido_paterno']?>" required maxlength="35">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Apellido materno</label><label style="color:red"></label>
                                    <input type="text" class="form-control"
                                        name="apellido_materno" value="<?php echo $rowe['apellido_materno']?>" maxlength="35">
                                </div>

                            <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo dependiente ec&oacutenomico</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" 
                                        name="id_cat_dependientes_economicos">
                                        <?php
                                        include ('../../php/CatDependientesEconomicosC/listar.php');
                                        echo '<option value="' . $rowe['id_cat_dependientes_economicos'] . '">' . listadoDEconomicosPK($rowe['id_cat_dependientes_economicos']) . '</option>';
                                        $listado = listadoDEconomicos();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_dependientes_economicos'] != $row->id_cat_dependientes_economicos){
                                                    echo '<option value="' . $row->id_cat_dependientes_economicos . '">' . listadoDEconomicosPK($row->id_cat_dependientes_economicos) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            
                            </div>
                            
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados).'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validarCurp();"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>

<script>
    function validarCurp() {
        var curp = document.getElementById('curp').value.toUpperCase()
        var valido = false;

        if (!curpValida(curp)) {
            messajeError("CURP inválida");
        } else {
            valido = true;
        }
        return valido;
        // resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
    }
</script>

<?php  include("libFooter.php"); ?>
</html>