<div class="card border-light">
    <div class="row font-size-modulo">
        <div class="col-4">
            <label class="text-input-rem div-spacing">Fecha de expedici&oacuten</label><label
                class="text-required"></label>
            <input type="date" class="form-control" id="fecha_expedicion" placeholder="">
        </div>
        <div class="col-4">
            <label class="text-input-rem div-spacing">Fecha de ingreso al gobierno federal</label><label
                class="text-required"></label>
            <input type="date" class="form-control" id="fecha_ingreso_gob_fed" placeholder="">
        </div>
        <div class="col-4">
            <label class="text-input-rem div-spacing">Vigencia del</label><label class="text-required"></label>
            <input type="date" class="form-control" id="vigencia_del" placeholder="">
        </div>
    </div>

    <div class="div-spacing"></div>
    <div class="row">
        <div class="col-4">
            <label class="text-input-rem div-spacing">Vigencia al</label><label class="text-required"></label>
            <input type="date" class="form-control" id="vigencia_al" placeholder="">
        </div>
        <div class="col-8">
            <label class="text-input-rem div-spacing">Antiguedad</label><label class="text-required"></label>
            <input maxlength="60" type="text" class="form-control" onkeyup="convertirAMayusculas(event,'antiguedad')" id="antiguedad" placeholder="Antiguedad">
        </div>
    </div>

    <div class="div-spacing"></div>
    <div class="row">
        <div class="col-12">
            <label class="text-input-rem div-spacing">Funciones</label><label class="text-required"></label>
            <input maxlength="120" type="text" class="form-control" onkeyup="convertirAMayusculas(event,'funciones')" id="funciones" placeholder="Funciones">
        </div>
    </div>

    <div class="div-spacing"></div>
    <div class="modal-footer">
        <input type="hidden" id="id_tbl_domicilios">
        <button type="button" class="btn btn-success save-botton-modal" onclick="return validarAdicional();"><i
                class="fas fa-save"></i> Guardar</button>
        <input type="hidden" id="id_ctrl_adic_emp_hraes">
    </div>
</div>

<!--
<div class="card-body">
    <div class="form-row">

        <div class="form-group col-md-6">
            <label>Fecha de expedici&oacuten</label><label style="color:red"></label>
            <input type="date" class="form-control" id="fecha_expedicion" placeholder="">
        </div>

        <div class="form-group col-md-6">
            <label>Fecha de ingreso al gobierno federal</label><label style="color:red"></label>
            <input type="date" class="form-control" id="fecha_ingreso_gob_fed" placeholder="">
        </div>

        <div class="form-group col-md-3">
            <label>Vigencia del</label><label style="color:red"></label>
            <input type="date" class="form-control" id="vigencia_del" placeholder="">
        </div>

        <div class="form-group col-md-3">
            <label>Vigencia al</label><label style="color:red"></label>
            <input type="date" class="form-control" id="vigencia_al" placeholder="">
        </div>

        <div class="form-group col-md-6">
            <label>Antiguedad</label><label style="color:red"></label>
            <input maxlength="80" type="text" class="form-control" id="antiguedad" placeholder="Antiguedad">
        </div>

        <div class="form-group col-md-12">
            <label>Funciones</label><label style="color:red"></label>
            <input maxlength="300" type="text" class="form-control" id="funciones" placeholder="Funciones">
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" onclick="return validarAdicional();"
            class="btn btn-light boton-con-imagen_table color-butto-modulo"><img
                src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>
        <input type="hidden" id="id_ctrl_adic_emp_hraes">
    </div>


</div>
-->