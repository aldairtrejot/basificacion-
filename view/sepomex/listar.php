<?php
include("../../php/CatSepomexC/listar.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/messages.js"></script>
    <script src="../../js/estatus/validarEstatus.js"></script>
</head>

<body>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estado</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="c_estado"
                                        name="c_estado" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listarCatSepmexEstado();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->c_estado . '">' . $row->d_estado . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Municipio</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="d_mnpio"
                                        name="d_mnpio" required>
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Colonia</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="colonia_origen"
                                        name="colonia_origen" required>
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                </div>

                            </div>


            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



</body>
<script>
    var select = document.getElementById('c_estado');
    $(document).ready(function () {
        $('#c_estado').change(function () {
            var c_estado = $(this).val();
            $.ajax({
                type: 'POST',
                url: '../../php/CatSepomexC/SelectMunicipio.php',
                data: { c_estado: c_estado },
                success: function (data) {
                    $('#d_mnpio').html(data);
                }
            });
        });

        $('#d_mnpio').change(function () {
            var d_mnpio = $(this).val();
            var c_estado = select.value;
            $.ajax({
                type: 'POST',
                url: '../../php/CatSepomexC/SelectColonia.php',
                data: { d_mnpio: d_mnpio, c_estado: c_estado},
                success: function (data) {
                    $('#colonia_origen').html(data);
                }
            });
        });


    });
</script>

<?php include("libFooter.php"); ?>

</html>