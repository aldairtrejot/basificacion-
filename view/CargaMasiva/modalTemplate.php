<div class="modal fade" id="exampleModalDescargas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modulo descargas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../../php/CargaMasivaC/Descargas.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputCity">Seleccione el documento</label><label style="color:red">*</label><br>
                        <select class="form-control" aria-label="Default select example" id="id_cat_plantilla"
                            name="id_cat_plantilla" required>
                            <option value="" selected="true">Seleccione</option>
                            <option value="1">Doc. Carga masiva (Dependientes económicos - Plantilla)</option>
                            <option value="2">Doc. Carga masiva (Pago juguetes - Plantilla)</option>
                            <option value="10">Doc. Pago juguetes (Pago juguetes - Descarga)</option>
                        </select>

                        <div Style="display:none" name="input-10">
                            <label for="inputCity">Seleccione la fecha</label><label style="color:red">*</label><br>
                            <select class="form-control" aria-label="Default select example" id="id_cat_fecha_juguetes"
                                name="id_cat_fecha_juguetes">
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
                    </div>

                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                <button type="submit" class="btn btn-secondary"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Descargar</button>
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