<?php
include '../../nav-menu.php';
?>
<div class="container-fluid bg-image nav-padding">
    <br>
    <div class="card border-light shadow-lg">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col padding-left-0">
                        <h4>Sistema Integral de Resursos Humanos</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <div class="row div-spacing">
                <div class="col-9">
                    <h2 class="card-title tittle-card-index">Usuarios del sistema</h2>
                </div>
                <div class="col-3 search-container">
                    <input onkeyup="buscarUsuario();" id="buscarUsuario" type="text" placeholder="Buscar..."
                        class="form-control mr-sm-2 search-input">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <div class="row div-spacing">
                <div class="col-9">
                    <div class="form-inline">
                        <button onclick="agregarEditarUsuarios(null)" class="btn btn-light"><i
                                class="fa fa-user-plus icon-size-add"></i>
                            <span class="hide-menu text-button-add">&nbsp;Agregar usuario</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table class="table table-bordered" id="tabla_usuarios" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="" style=" float: right;">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idUsertable">1</label>
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

<?php include 'AgregarEditar.php' ?>
<?php include '../../librerias.php' ?>
<script src="../../../../js/Admin/Usuarios/Usuarios.js"></script>
<script src="../../../../js/Admin/Usuarios/validar.js"></script>