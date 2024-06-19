<?php

include('../CatSepomexC/listar.php');
$d_mnpio = $_POST['d_mnpio'];
$c_estado = $_POST['c_estado'];

$listado = listarCatSepmexColonia($d_mnpio, $c_estado);
if ($listado) {
    if (pg_num_rows($listado) > 0) {
        while ($row = pg_fetch_object($listado)) {
            echo '<option value="' . $row->id_cat_sepomex . '">' . $row->colonia_origen . '</option>';
        }
    }
}

