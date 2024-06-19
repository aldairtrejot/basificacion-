<?php
    include("../../php/RegistroPatronalC/Listar.php");
    $id_tbl_registro_patronal = base64_decode($_GET['D-F']); //Se obtiene el id
    $crypt = base64_decode($_GET['D-F2']); //Se obtiene el id
    $rowe = listadoPk($id_tbl_registro_patronal);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar Registro Patronal</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Registro Patronal</a>
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
                        <form method="POST" action="../../php/RegistroPatronalC/Editar.php">
                            <div class="form-row">
                            <input type="hidden" id="id_tbl_registro_patronal" name="id_tbl_registro_patronal" value="<?php echo $id_tbl_registro_patronal?>" />
                            <input type="hidden" id="crypt" name="crypt" value="<?php echo $crypt?>" />
                                <div class="form-group col-md-6">
                                    <label >Registro Patronal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="registro_patronal" name="registro_patronal" value="<?php echo $rowe['registro_patronal']?>">
                                </div>
                                
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            onclick="history.back()">Cancelar</a>
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