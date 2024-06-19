<div class="row">
    <div class="col-1">
        <div class="form-inline">
            <button onclick="agregarEditarJefe(null)" class="btn btn-light boton-con-imagen_table" id="button_agregar_all">
            <img src="../../../../assets/icons/agregar.png" alt="Imagen del botón">
            </button>
        </div>
    </div>
    <!--
    <div class="col-9">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_j" onkeyup="buscarJefe();"
            aria-label="Search">
    </div>
-->
    <div class="col-5 search-container">
        <input onkeyup="buscarJefe();" id="buscar_j" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<p></p>

<p></p>

<table class="table table-sm" id="tabla_jefe" style="width:100%">
</table>

<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_j()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_j">1</label>
    <button onclick="siguienteValor_j()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>

<?php include 'AgregarEditar.php' ?>