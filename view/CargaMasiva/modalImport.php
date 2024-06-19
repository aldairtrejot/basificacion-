
<div class="modal fade" id="exampleModalImportar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carga Masiva - ER<?php echo (listarControlCargaMasivaByMax() + 1) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../../php/CargaMasivaC/Importar.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputCity">Seleccione el tipo de carga</label><label style="color:red">*</label><br>
                        <select class="form-control" aria-label="Default select example" id="id_cat_carga_masiva"
                            name="id_cat_carga_masiva" required>
                            <option value="" selected="true">Seleccione</option>
                            <?php
                            $listado = listadoCargaMasivaByAll();
                            if ($listado) {
                                if (pg_num_rows($listado) > 0) {
                                    while ($row = pg_fetch_object($listado)) {
                                        echo '<option value="' . $row->id_cat_carga_masiva . '">' . $row->nombre . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>

                        <div>
                            <label for="inputCity">Seleccione la fecha</label><label style="color:red">*</label><br>
                            <select class="form-control" aria-label="Default select example" id="id_cat_fecha_juguetes"
                                name="id_cat_fecha_juguetes" required>
                                <option value="" selected>Seleccione</option>
                                <?php
                                //Se incluye la conexion
                                $listado = listadoFechaJuguetes();
                                if ($listado) {
                                    if (pg_num_rows($listado) > 0) {
                                        while ($row = pg_fetch_object($listado)) {
                                            echo '<option value="' . $row->id_cat_fecha_juguetes . '">' . $row->fecha . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputCity">Seleccione el archivo</label><label style="color:red">*</label><br>
                            <input class="form-control" type="file" id="archivo" name="archivo" required>
                        </div>
                    </div>

                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                <button type="" class="btn btn-secondary" onclick="return validateExtension1();"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Importar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const grado_academico = document.querySelector("#id_cat_plantilla");
    const input = document.querySelector("[name=input-10]");

    grado_academico.addEventListener("change", () => {
        if (grado_academico.value === "10") {///PAGO DE JUGUETES
            input.style.display = 'initial';
        } else {
            input.style.display = 'none';
        }
    });
</script>