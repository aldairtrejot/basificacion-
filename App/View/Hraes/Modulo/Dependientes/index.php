<div class="row font-size-modulo">
    <div class="col-9">
        <div class="form-inline">
            <button onclick="agregarEditarDependiente(null)" class="btn btn-light"><i class="fa fa-plus icon-size-add"></i>
                <span class="hide-menu text-button-add font-size-modulo">&nbsp;Agregar dependiente econ&oacutemico</span>
            </button>
        </div>
    </div>
    <div class="col-3 search-container">
        <input onkeyup="buscarDependiente();" id="buscar_de" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input-small">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<br>
<div class="row">
    <div class="col">
        <div class="text-center">
            <table class="table table-bordered" id="modulo_dependientes_economicos" style="width:100%">
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-right">
            <button onclick="anteriorValor_de()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
            <label id="idtable_de">1</label>
            <button onclick="siguienteValor_de()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
        </div>
    </div>
</div>

<?php include 'AgregarEditar.php' ?>

