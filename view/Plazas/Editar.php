<?php
include ("../../php/PlazasC/Listar.php");
$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_control_plazas = base64_decode($_GET['D-F']); //Se obtiene el id
$rowe = catControlPlazasPk($id_tbl_control_plazas); //Se obtiene el array con la info del cliente
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php include ("libHeader.php"); ?>
</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar Plaza</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Control Plazas</a>
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
                        <form method="POST" action="../../php/PlazasC/Editar.php">
                            <input type="hidden" id="id_tbl_control_plazas" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo"
                                value="<?php echo $id_tbl_centro_trabajo ?>">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. de plaza</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="num_plaza"
                                        value="<?php echo $rowe['num_plaza']; ?>" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo de plaza</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_plazas" required>
                                        <?php
                                        include ("../../php/CatPlazasC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_plazas'] . '">' . catalogoPlazaPk($rowe['id_cat_plazas']) . '</option>';
                                        $listado = listadoCP();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_plazas'] != $row->id_cat_plazas) {
                                                        echo '<option value="' . $row->id_cat_plazas . '">' . $row->codigo_plaza . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo de contrataci&oacuten</label><label
                                        style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_tipo_contratacion" required>
                                        <?php
                                        include ("../../php/CatTipoContratacionC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_tipo_contratacion'] . '">' . catalogoContratacionPk($rowe['id_cat_tipo_contratacion']) . '</option>';
                                        $listado = listadoContratacion();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_tipo_contratacion'] != $row->id_cat_tipo_contratacion) {
                                                        echo '<option value="' . $row->id_cat_tipo_contratacion . '">' . $row->descripcion_cont . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Unidad responsable</label><label
                                        style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_unidad_responsable" required>
                                        <?php
                                        include ("../../php/CatUnidadResponsableC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_unidad_responsable'] . '">' . catPk($rowe['id_cat_unidad_responsable']) . '</option>';
                                        $listado = $listadoUR;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_unidad_responsable'] != $row->id_cat_unidad_responsable) {
                                                        echo '<option value="' . $row->id_cat_unidad_responsable . '">' . catPk($row->id_cat_unidad_responsable) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Puesto</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_puesto" required>
                                        <?php
                                        include ("../../php/CatPuestoC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_puesto'] . '">' . catalogoPuestoPk($rowe['id_cat_puesto']) . '</option>';
                                        $listado = listadoPuesto();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_puesto'] != $row->id_cat_puesto) {
                                                        echo '<option value="' . $row->id_cat_puesto . '">' . $row->codigo_puesto . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Zona tabulares</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_zonas_tabuladores" required>
                                        <?php
                                        include ("../../php/CatZonaTabuladoresC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_zonas_tabuladores'] . '">' . catalogoZonaPk($rowe['id_cat_zonas_tabuladores']) . '</option>';
                                        $listado = listadoZona();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_zonas_tabuladores'] != $row->id_cat_zonas_tabuladores) {
                                                        echo '<option value="' . $row->id_cat_zonas_tabuladores . '">' . $row->zona_tabuladores . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_niveles" required>
                                        <?php
                                        include ("../../php/CatNivelesC1/listar.php");
                                        echo '<option value="' . $rowe['id_cat_niveles'] . '">' . catalogoNivelesPk($rowe['id_cat_niveles']) . '</option>';
                                        $listado = listar();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_niveles'] != $row->id_cat_niveles) {
                                                        echo '<option value="' . $row->id_cat_niveles . '">' . $row->codigo . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Zona pagadora</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="zona_pagadora"
                                        value="<?php echo $rowe['zona_pagadora']; ?>" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha de ingreso</label><label style="color:red">*</label>
                                    <input type="date" class="form-control" name="fecha_ingreso_inst" required
                                        value="<?php echo $rowe['fecha_ingreso_inst']; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha incio de movimiento</label><label style="color:red">*</label>
                                    <input type="date" class="form-control" name="fecha_inicio_movimiento" required
                                        value="<?php echo $rowe['fecha_inicio_movimiento']; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha termino de movimiento</label><label style="color:red">*</label>
                                    <input type="date" class="form-control" name="fecha_termino_movimiento" required
                                        value="<?php echo $rowe['fecha_termino_movimiento']; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha de modifici&oacuten</label><label style="color:red">*</label>
                                    <input type="date" class="form-control" name="fecha_modificacion" required
                                        value="<?php echo $rowe['fecha_modificacion']; ?>">
                                </div>

                            </div>

                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo 'Listar.php?RP=' . $id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include ('../../ajuste-menu.php') ?>
            <?php include ('../../footer-librerias.php') ?>

</body>
<?php include ("libFooter.php"); ?>

</html>