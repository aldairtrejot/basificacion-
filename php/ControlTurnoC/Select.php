<?php
include('../CatHorarioC/listar.php');
$id_cat_turno = $_POST['id_cat_turno'];

$listado = listadoHorarioAll($id_cat_turno);
if ($listado) {
    if (pg_num_rows($listado) > 0) {
        while ($row = pg_fetch_object($listado)) {
            echo '<option value="' . $row->id_cat_horario . '">' . listadoHorarioPk($row->id_cat_horario) . '</option>';
        }
    }
}

?>