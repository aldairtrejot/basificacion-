<?php include("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/CatRegionC/listar.php") //Se incluye la libreria para generar las sql para el catalogo de region?> 
    <?php include("../../php/CatEstatusC/listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus?> 
    <?php include("../../php/CatEntidadC/listar.php");?>
    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar centro de trabajo</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos.</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/CentroTrabajoC/Agregar.php">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Clave de centro de trabajo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="clave_centro_trabajo" name="clave_centro_trabajo" placeholder="Clave de centro de trabajo" required maxlength="50">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="nombre" name="nombre" placeholder="Nombre" required maxlength="50">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Pa&iacutes</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="50"
                                        id="pais" name="pais" placeholder="Pais">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Entidad</label><label style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example" id="entidad"
                                        name="entidad" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoCatEntidadByName();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_entidad . '">' . $row->entidad . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="colonia" name="colonia" placeholder="Colonia" required maxlength="50">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >C&oacutedigo postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="5"
                                        id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >N&uacutem. exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="30"
                                        id="num_exterior" name="num_exterior" placeholder="Numero Exterior" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label >N&uacutem. interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="30"
                                        id="num_interior" name="num_interior" placeholder="Numero Interior">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Latitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="30"
                                        id="latitud" name="latitud" placeholder="Latitud">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Longitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" required maxlength="30"
                                        id="longitud" name="longitud" placeholder="Longitud">
                                </div>
                      
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Region</label><label style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example" id="id_cat_region"
                                        name="id_cat_region" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($listadoCR) {
                                            if (pg_num_rows($listadoCR) > 0) {
                                                while ($rowCR = pg_fetch_object($listadoCR)) {
                                                    echo '<option value="' . $rowCR->id_cat_region . '">' . $rowCR->clave_region .  " - "  . $rowCR->region . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example" id="id_estatus_centro"
                                        name="id_estatus_centro" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($listadoCE) {
                                            if (pg_num_rows($listadoCE) > 0) {
                                                while ($rowCE = pg_fetch_object($listadoCE)) {
                                                    echo '<option value="' . $rowCE->id_cat_estatus . '">' . $rowCE->estatus . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
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
    var select = document.getElementById('c_estado');
    $(document).ready(function () {
        $('#c_estado').change(function () {
            var c_estado = $(this).val();
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
<?php  include("libFooter.php"); ?>
</html>