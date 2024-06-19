<div class="row">
    <div class="col-1">

        <button onclick="agregarEditarFormaPago(null)" class=" btn btn-light boton-con-imagen_table" id="button_agregar_all">
            <img src="../../../../assets/icons/agregar.png" alt="Imagen del botón">
            <span class="hide-menu" style="font-weight: bold;">&nbsp;</span>
        </button>

        <!--
        <div class="form-inline">
            <button onclick="agregarEditarFormaPago(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar</span>
            </button>
        </div>
-->
    </div>
    <div class="col-5 search-container">
        <input onkeyup="buscarFormaPago();" id="buscar_f" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>

    <!--
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_f"
            onkeyup="buscarFormaPago();" aria-label="Search">
-->
</div>

<p></p>

<p></p>

<table class="table table-sm" id="tabla_forma_pago" style="width:100%">
</table>
<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_f()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_f">1</label>
    <button onclick="siguienteValor_f()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>


<?php include 'AgregarEditar.php' ?>