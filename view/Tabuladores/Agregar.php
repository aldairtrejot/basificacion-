<?php include ("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include ("libHeader.php"); ?>

</head>

<body>
    <?php include ('../nav-menu.php') ?>
    <?php include ("../../php/CatRegionC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de region  ?>
    <?php include ("../../php/CatEstatusC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus  ?>
    <?php include ('../../php/CatNivelesC/listar.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar tabuladores</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Tabuladores </a>
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
                        <form method="POST" action="../../php/TabuladoresC/Agregar.php">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Sbe</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="sbe" placeholder="Sbe">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Cg</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="cg" placeholder="cg">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Sb</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="sb" placeholder="sb">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Cs</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="cs" placeholder="cs">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Cp</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="cp" placeholder="cp">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Ab</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="ab" placeholder="ab">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Aga</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="aga" placeholder="aga">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Bmr</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="bmr" placeholder="bmr">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Cbmr</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="cbmr" placeholder="cbmr">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Ad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="ad" placeholder="ad">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Adm</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="adm" placeholder="adm">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Psm</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="psm" placeholder="psm">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Asx</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="asx" placeholder="asx">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Sh</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control" name="sh" placeholder="sh">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha de inicio</label><label style="color:red">*</label><br>
                                    <input type="date" class="form-control" name="fecha_ini">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha fin</label><label style="color:red">*</label><br>
                                    <input type="date" class="form-control" name="fecha_fin">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_niveles" id="id_cat_niveles">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listado();

                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_niveles . '">' . $row->codigo . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tipo de contrataci&oacuten</label><label style="color:red">*</label>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_tipo_contratacion" name="id_cat_tipo_contratacion">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ('../../php/CatTipoContratacionC/listar.php');
                                        $listado = listadoContratacion();

                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_tipo_contratacion . '">' . $row->descripcion_cont . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo de puesto</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example" id="id_cat_puesto"
                                        name="id_cat_puesto">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ('../../php/CatPuestoC/listar.php');
                                        $listado = listadoPuesto();

                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_puesto . '">' . $row->codigo_puesto . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Zona tabulador</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_zona_tabuladores" name="id_cat_zona_tabuladores">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ('../../php/CatZonaTabuladoresC/listar.php');
                                        $listado = listadoZona();

                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_zonas_tabuladores . '">' . $row->zona_tabuladores . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- FIN -->
                            </div>


                            <a class="btn btn-secondary"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include ('../../ajuste-menu.php') ?>
            <?php include ('../../footer-librerias.php') ?>



</body>

<?php include ("libFooter.php"); ?>

</html>