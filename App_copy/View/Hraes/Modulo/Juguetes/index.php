<div class="row">
    <div class="col-1">
        <div class="form-inline">
            <button onclick="agregarEditarJuguete(null)" class=" btn btn-light boton-con-imagen" id="agregar_forma_pago">
            <img src="../../../../assets/icons/agregar.png" alt="Imagen del botón">
            </button>
            <!--
    <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i></a>
-->
        </div>
    </div>
    <!--
    <div class="col-10">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_ju"
            onkeyup="buscarJuguete();" aria-label="Search">
    </div>
-->
    <div class="col-5 search-container">
        <input onkeyup="buscarJuguete();" id="buscar_ju" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<br>

<p></p>

<p></p>
<table class="table table-sm" id="tabla_jueguetes" style="width:100%">
</table>

<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_ju()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_ju">1</label>
    <button onclick="siguienteValor_ju()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>


<?php include 'AgregarEditar.php' ?>