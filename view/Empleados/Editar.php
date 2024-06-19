<?php
    include("../../php/EmpleadosC/Listar.php");
    $id_tbl_centro_trabajo = ($_GET['RP']);
    $id_tbl_control_plazas = $_GET['D-F3'];
    $id_tbl_empleados = base64_decode($_GET['D-F']); //Se obtiene el id
    $rowe = catEmpleadosId($id_tbl_empleados); //Se obtiene el array con la info del cliente
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper" >

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar empleado</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="#" style="color:#cb9f52;">Control de Empleados</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                <h5 class="card-header">Ingresa los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/EmpleadosC/Editar.php">
                            <input type="hidden" name="id_tbl_control_plazas" value="<?php echo $id_tbl_control_plazas?>">
                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                            
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Curp</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="curp" value="<?php echo $rowe['curp']?>" required maxlength="18">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" value="<?php echo $rowe['nombre']?>" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Primer apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" value="<?php echo $rowe['primer_apellido']?>" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Segundo apellido</label><label style="color:red"></label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" value="<?php echo $rowe['segundo_apellido']?>" maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Rfc</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="rfc" value="<?php echo $rowe['rfc']?>" required maxlength="13">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >N&uacutem. de seguro social</label><label style="color:red"></label>
                                    <input type="number" class="form-control"
                                        name="nss" value="<?php echo $rowe['nss']?>" maxlength="11">
                                </div>

                            </div>
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            href="<?php echo 'Listar.php?D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
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