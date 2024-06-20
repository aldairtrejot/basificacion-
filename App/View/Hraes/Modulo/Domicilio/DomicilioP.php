<div class="card border-light">

    <div class="row font-size-modulo">
        <div class="col-3">
            <label class="text-input-rem div-spacing">C&oacutedigo postal</label><label class="text-required">*</label>
            <input onkeyup="buscarInfor();" type="number" class="form-control" id="codigo_postal1"
                placeholder="Código postal" maxlength="25">
        </div>
        <div class="col-4">
            <label class="text-input-rem div-spacing">Municipio</label><label class="text-required">*</label>
            <div class="custom-select-wrapper">
                <select class="form-control" aria-label="Default select example" id="municipio1" required>
                </select>
            </div>
        </div>

        <div class="col-3">
            <label class="text-input-rem div-spacing">Entidad</label><label class="text-required">*</label>
            <fieldset disabled>
                <input type="text" class="form-control" id="entidad1" placeholder="Entidad" maxlength="25">
            </fieldset>
        </div>

        <div class="col-2">
            <label class="text-input-rem div-spacing">Pa&iacutes</label><label class="text-required">*</label>
            <fieldset disabled>
                <input type="text" class="form-control" id="pais_f" placeholder="MÉXICO" maxlength="25">
            </fieldset>
        </div>
    </div>

    <div class="div-spacing"></div>
    <div class="row">
        <div class="col-6">
            <label class="text-input-rem div-spacing">Colonia</label><label class="text-required">*</label>
            <div class="custom-select-wrapper">
                <select class="form-control" aria-label="Default select example" id="colonia1" required>
                </select>
            </div>
            <!--

            <select data-style="input-select-selectpicker form-control" class="selectpicker form-control"
                aria-label="Default select example" data-live-search="true" id="colonia1"
                data-none-results-text="Sin resultados">
            </select>

            <div class="custom-select-wrapper">
                <select class="form-control" aria-label="Default select example" id="colonia1" required>
                </select>
            </div>
-->
        </div>

        <div class="col-6">
            <label class="text-input-rem div-spacing">Calle</label><label class="text-required"></label>
            <input onkeyup="convertirAMayusculas(event,'calle1')" type="text" class="form-control" id="calle1"
                placeholder="Calle" maxlength="35">
        </div>
    </div>

    <div class="div-spacing"></div>
    <div class="row">
        <div class="col-3">
            <label class="text-input-rem div-spacing">N&uacutem. exterior</label><label class="text-required">*</label>
            <input type="text" class="form-control" onkeyup="convertirAMayusculas(event,'num_exterior1')"
                id="num_exterior1" placeholder="Núm. exterior" maxlength="10">
        </div>
        <div class="col-3">
            <label class="text-input-rem div-spacing">N&uacutem. interior</label><label class="text-required"></label>
            <input type="text" class="form-control" onkeyup="convertirAMayusculas(event,'num_interior1')"
                id="num_interior1" placeholder="Núm. interior" maxlength="10">
        </div>
        <div class="col-3">
            <label class="text-input-rem div-spacing">C&oacutedigo postal f&iacutescal</label><label
                class="text-required"></label>
            <input oninput="validarNumero(this)" type="number" class="form-control" id="codigo_postal2"
                placeholder="Código postal" maxlength="25">
        </div>

        <div class="modal-footer">
            <input type="hidden" id="id_tbl_domicilios">
            <button type="button" class="btn btn-success save-botton-modal" onclick="return validarDomicilio();"><i
                    class="fas fa-save"></i> Guardar</button>
        </div>
    </div>
</div>