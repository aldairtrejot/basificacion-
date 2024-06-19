<div class="card-body">
    <div class="form-row">

        <div class="form-group col-md-2">
            <label>C&oacutedigo postal</label><label style="color:red">*</label>
            <input onkeyup="buscarInfor();" type="number" class="form-control" id="codigo_postal1"
                placeholder="Código postal" maxlength="25">
        </div>

        <div class="form-group col-md-3">
            <label>Municipio</label><label style="color:red">*</label>
            <select class="form-control" aria-label="Default select example" id="municipio1" required>
            </select>
        </div>


        <div class="form-group col-md-3">
            <label>Colonia</label><label style="color:red">*</label>
            <select class="form-control" aria-label="Default select example" id="colonia1" required>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label>Entidad</label><label style="color:red">*</label>
            <fieldset disabled>
                <input type="text" class="form-control" id="entidad1" placeholder="Entidad" maxlength="25">
            </fieldset>
        </div>

        <div class="form-group col-md-2">
            <label>Pa&iacutes</label><label style="color:red">*</label>
            <fieldset disabled>
                <input type="text" class="form-control" id="pais_f" placeholder="País" maxlength="25">
            </fieldset>
        </div>



        <div class="form-group col-md-6">
            <label>Calle</label><label style="color:red">*</label>
            <input type="text" class="form-control" id="calle1" placeholder="Calle" maxlength="35">
        </div>

        <div class="form-group col-md-2">
            <label>N&uacutem. exterior</label><label style="color:red"></label>
            <input type="text" class="form-control" id="num_exterior1" placeholder="Núm. exterior" maxlength="10">
        </div>

        <div class="form-group col-md-2">
            <label>N&uacutem. interior</label><label style="color:red"></label>
            <input type="text" class="form-control" id="num_interior1" placeholder="Núm. interior" maxlength="10">
        </div>

        <div class="form-group col-md-2">
            <label>C&oacutedigo postal f&iacutescal</label><label style="color:red"></label>
            <input type="number" class="form-control" id="codigo_postal2" placeholder="Código postal" maxlength="25">
        </div>

    </div>
</div>