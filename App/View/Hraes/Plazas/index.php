<?php
$id_tbl_centro_trabajo_hraes = null;
if (isset($_POST['id_tbl_centro_trabajo_hraes'])) {
    $id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];
}
?>
<?php include '../../nav-menu.php' ?>


<div class="container-fluid bg-image nav-padding">
    <input type="hidden" id="id_tbl_centro_trabajo_hraes" value="<?php echo $id_tbl_centro_trabajo_hraes ?>" />
    <br>
    <div class="card border-light shadow-lg">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col padding-left-0">
                        <h4>Hospital Regional de Alta Especialidad</h4>
                    </div>
                </div>
            </div>
            <?php if ($id_tbl_centro_trabajo_hraes != null) { ?>
                <div class="div-spacing"></div>

                <div class="row">
                    <div class="col-12">
                        <h6 class="text-input-form-bold-label   div-spacing">Nombre centro de trabajo: <label
                                id="nombreResult" class="text-result-normal"></label>
                        </h6>
                    </div>
                </div>

                <div class="row">

                    <div class="col-3">
                        <h6 class="text-input-form-bold-label div-spacing">Clave de centro de trabajo: <label id="clvResult"
                                class="text-result-normal"></label>
                        </h6>
                    </div>

                    <div class="col-2">
                        <h6 class="text-input-form-bold-label   div-spacing">C&oacutedigo postal: <label id="cpResult"
                                class="text-result-normal"></label>
                        </h6>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <div class="row div-spacing">
                <div class="col-9">
                    <h2 class="card-title tittle-card-index">Plazas</h2>
                </div>
                <div class="col-3 search-container">
                    <input onkeyup="buscarPlaza();" id="buscar" type="text" placeholder="Buscar..."
                        class="form-control mr-sm-2 search-input">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <?php if ($id_tbl_centro_trabajo_hraes != null) { ?>
                <div class="row div-spacing">
                    <div class="col-9">
                        <div class="form-inline">
                            <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i
                                    class="fa fa-plus icon-size-add"></i>
                                <span class="hide-menu text-button-add">&nbsp;Agregar plaza</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row div-spacing">
                    <div class="col-9">
                        <div class="form-inline">
                            <button class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i
                                    class="fa fa-plus icon-size-add"></i>
                                <span class="hide-menu text-button-add">&nbsp;Agregar plaza</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table class="table table-bordered" id="tabla_plazas" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-right">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idtable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal agregar plaza-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle">Agregar Plaza</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <h6 class="alert-heading"><i class="fa fa-exclamation-circle"></i> ¿Cómo agregar una plaza?</h6>
                    <p>Para agregar una plaza, sigue estos pasos:</p>
                    <p> - Desde el menú del centro de trabajo o accede pulsando el botón 'Ir'</p>
                    <p> - Selecciona el centro de trabajo al que deseas añadir la plaza y dirígete a la
                        sección de 'Plazas Asignadas al Centro de Trabajo'.</p>
                    <p> - Aquí encontrarás todas las plazas que pertenecen a ese centro, junto con la opción de agregar
                        una nueva plaza.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                    Cancelar</button>
                <a href="../CentroTrabajo/index.php" type="button" class="btn btn-success save-botton-modal"><i
                        class="fa fa-arrow-circle-right"></i> Ir</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal agregar plaza-->




<script src="../../../../js/Hraes/Plazas/Busqueda.js"></script>
<script src="../../../../js/Hraes/Plazas/Plazas.js"></script>
<script src="../../../../js/Hraes/Plazas/validar.js"></script>
<?php include 'AgregarEditar.php' ?>
<?php include 'Detalles.php' ?>
<?php include '../../librerias.php' ?>