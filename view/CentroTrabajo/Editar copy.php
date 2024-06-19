<?php
    include("../../php/CentroTrabajoC/Listar.php");
    include("../../php/CatSepomexC/listar.php");
    $id_tbl_centro_trabajo = base64_decode($_GET['D-F']); //Se obtiene el id
    $rowe = catcentroTrabajo($id_tbl_centro_trabajo); //Se obtiene el array con la info del cliente
    $rowx = lisSepmexById($rowe['id_cat_sepomex']);
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
                        <h2 class="page-title">Modificar Centro de Trabajo</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="Listar.php" style="color:#cb9f52;">Centro de Trabajo</a>
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
                        <form method="POST" action="../../php/CentroTrabajoC/Editar.php">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Clave de Centro de Trabajo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="clave_centro_trabajo" name="clave_centro_trabajo" value="<?php echo $rowe["clave_centro_trabajo"]; ?>">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="nombre" name="nombre" value="<?php echo $rowe["nombre"]; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estado</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="c_estado"
                                        name="c_estado" required>
                                        <?php
                                        echo '<option value="' . $rowx['id_cat_sepomex'] . '">' . $rowx['d_estado'] . '</option>';
                                        $listado = listarCatSepmexEstado();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->c_estado . '">' . $row->d_estado . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Pais</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="pais" name="pais" value="<?php echo $rowe["pais"]; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Municipio</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="d_mnpio"
                                        name="d_mnpio" required>
                                        <?php
                                            echo '<option value="' . $rowx['id_cat_sepomex'] . '">' . $rowx['d_mnpio'] . '</option>';
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero Exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="num_exterior" name="num_exterior" value="<?php echo $rowe["num_exterior"]; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Colonia</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="colonia_origen"
                                        name="colonia_origen" required>
                                        <?php
                                            echo '<option value="' . $rowx['id_cat_sepomex'] . '">' . $rowx['d_asenta'] . '</option>';
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero Interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="num_interior" name="num_interior" value="<?php echo $rowe["num_interior"]; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Latitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="latitud" name="latitud" value="<?php echo $rowe["latitud"]; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Longitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="longitud" name="longitud" value="<?php echo $rowe["longitud"]; ?>">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Region</label><label style="color:red">*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_region"
                                        name="id_cat_region">
                                        <?php
                                        include("../../php/CatRegionC/Listar.php");
                                        echo '<option value="' . $rowe["id_cat_region"] . '">' . catRegionRegion($rowe["id_cat_region"]) . '</option>';
                                        
                                        if ($listadoCR) {
                                            if (pg_num_rows($listadoCR) > 0) {
                                                while ($rowCR = pg_fetch_object($listadoCR)) {
                                                    if ($rowe["id_cat_region"] != $rowCR->id_cat_region){
                                                    echo '<option value="' . $rowCR->id_cat_region . '">' . $rowCR->clave_region .  " - "  . $rowCR->region . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_estatus_centro"
                                        name="id_estatus_centro">
                                        <?php
                                        include("../../php/CatEstatusC/Listar.php");
                                        echo '<option value="' . $rowe["id_estatus_centro"] . '">' . catEstatus($rowe["id_estatus_centro"]) . '</option>';
                                        
                                        if ($listadoCE) {
                                            if (pg_num_rows($listadoCE) > 0) {
                                                while ($rowCE = pg_fetch_object($listadoCE)) {
                                                    if ($rowe["id_estatus_centro"] != $rowCE->id_cat_estatus){
                                                    echo '<option value="' . $rowCE->id_cat_estatus . '">' . $rowCE->estatus . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
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

<script>
    var select = document.getElementById('c_estado');
    $(document).ready(function () {
        $('#c_estado').change(function () {
            var c_estado = $(this).val();
            console.log("entro: ",c_estado);
            $.ajax({
                type: 'POST',
                url: '../../php/CatSepomexC/SelectMunicipio.php',
                data: { c_estado: c_estado },
                success: function (data) {
                    $('#d_mnpio').html(data);
                }
            });
        });

        $('#d_mnpio').change(function () {
            var d_mnpio = $(this).val();
            var c_estado = select.value;
            $.ajax({
                type: 'POST',
                url: '../../php/CatSepomexC/SelectColonia.php',
                data: { d_mnpio: d_mnpio, c_estado: c_estado},
                success: function (data) {
                    $('#colonia_origen').html(data);
                }
            });
        });


    });
</script>

</html>