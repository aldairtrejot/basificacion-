<div class="row">
    <div class="col-1">
        <div class="form-inline">
            <button onclick="agregarEditarDependiente(null)" class=" btn btn-light boton-con-imagen_table"
                id="button_agregar_all">
                <img src="../../../../assets/icons/agregar.png" alt="Imagen del botón">
            </button>
        </div>
    </div>
    <div class="col-5 search-container">
        <input onkeyup="buscarDependiente();" id="buscar_de" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
    <!--
    <div class="col-9"><input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_de"
            onkeyup="buscarDependiente();" aria-label="Search"></div>
-->
</div>

<p></p>

<p></p>
<table class="table table-sm" id="modulo_dependientes_economicos" style="width:100%">
</table>

<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_de()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_de">1</label>
    <button onclick="siguienteValor_de()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>

<?php include 'AgregarEditar.php' ?>