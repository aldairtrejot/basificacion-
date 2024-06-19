<?php

include('../CatSepomexC/listar.php');
$c_estado = $_POST['c_estado'];

$listado = listarCatSepmexMunicipio($c_estado);
if ($listado) {
    if (pg_num_rows($listado) > 0) {
        while ($row = pg_fetch_object($listado)) {
            echo '<option value="' . $row->c_mnpio . '">' . $row->d_mnpio . '</option>';
        }
    }
}

