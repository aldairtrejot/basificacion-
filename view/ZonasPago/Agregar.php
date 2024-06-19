<?php
    $id_tbl_centro_trabajo = base64_decode($_GET['D-F']); //Se obtiene el id
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
                        <h2 class="page-title">Agregar Zona de Pago</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#cb9f52;">Zonas de Pago</a>
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
                        <form method="POST" action="../../php/ZonasPagoC/Agregar.php">
                            <div class="form-row">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>" />
                                
                                <div class="form-group col-md-6">
                                    <label >Codigo</label><label style="color:red">*</label>
                                    <input type="number" class="form-control"
                                        id="codigo" name="codigo" placeholder="Codigo">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >RFC</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="rfc" name="rfc" placeholder="RFC">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Unidad Responsable</label><label style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example" id="id_cat_unidad_responsable"
                                        name="id_cat_unidad_responsable" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ('../../php/CatUnidadResponsableC/listar.php');
                                        if ($listadoUR) {
                                            if (pg_num_rows($listadoUR) > 0) {
                                                while ($row = pg_fetch_object($listadoUR)) {
                                                    echo '<option value="' . $row->id_cat_unidad_responsable . '">' . $row->codigo . ' - ' . $row->nombre . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_centro_trabajo) ?>">Cancelar</a>
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