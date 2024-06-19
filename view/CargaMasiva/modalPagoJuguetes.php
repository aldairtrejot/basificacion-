<div class="modal fade" id="modalDescarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pago de Juguetes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../../php/ControlJuguetesC/ExportarExel.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
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

                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                <button type="submit" class="btn btn-secondary" onclick="return validateExtension();"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Descargar</button>
                </form>
            </div>
        </div>
    </div>
</div>