<?php include("../../php/RegimenFiscalC/listar.php");
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
    <?php include ("../../php/CatCentroTrabajoC/listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar plaza</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Control de plazas</a>
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
                        <form method="POST" action="../../php/PlazasC/Agregar.php">
                            <div class="form-row">
                                
                                <input type="hidden" name="id_tbl_centro_trabajo" value="<?php echo $id_tbl_centro_trabajo?>">

                                <div class="form-group col-md-6">
                                    <label >N&uacutem. de plaza</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="num_plaza" placeholder="Numero de Plaza" required maxlength="30" >
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo de plaza</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_plazas" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatPlazasC/listar.php");
                                        $listado = listadoCP();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_plazas . '">' . $row->codigo_plaza . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo de contrataci&oacuten</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_tipo_contratacion" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatTipoContratacionC/listar.php");
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
                                    <label for="inputCity">Unidad responsable</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_unidad_responsable" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatUnidadResponsableC/listar.php");
                                        $listado = $listadoUR;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_unidad_responsable . '">' . catPk($row->id_cat_unidad_responsable) . '</option>';
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
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatPuestoC/listar.php");
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
                                    <label for="inputCity">Zona tabulares</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_zonas_tabuladores" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatZonaTabuladoresC/listar.php");
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

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_cat_niveles" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatNivelesC/listar.php");
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
                                    <label >Zona pagadora</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="zona_pagadora" placeholder="Zona Pagadora" required maxlength="30">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de ingreso</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_ingreso_inst" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha incio de movimiento</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_inicio_movimiento" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha termino de movimiento</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_termino_movimiento" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de modifici&oacuten</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_modificacion" required>
                                </div>
                              
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo 'Listar.php?RP='.$id_tbl_centro_trabajo?>">Cancelar</a>
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