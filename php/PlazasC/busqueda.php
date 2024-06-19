<?php
include("Listar.php");
include("../CatTipoContratacionC/listar.php");
include("../CatSituacionPlazaC/listar.php");
include("../CatPuestoC/listar.php");

$idSearchPlaza = $_POST['idSearchPlaza'];
$listado = listarLikePlaza($idSearchPlaza);

echo "
<thead>
<tr style='background-color: #5c5c5c; width:100%;'>
    <th style='color: white;'>Menu</th>
    <th style='color: white;'>Plaza</th>
    <th style='color: white;'>Contratacion</th>
    <th style='color: white;'>Puesto</th>
    </tr>
</thead>";

while ($obj = pg_fetch_object($listado)) {
    $id_tbl_control_plazas = base64_encode($obj->id_tbl_control_plazas);
    $id_tbl_centro_trabajo = base64_encode($obj->id_tbl_centro_trabajo);
    $id_cat_tipo_contratacion = catalogoContratacionPk($obj->id_cat_tipo_contratacion);
    $id_cat_situacion_plaza = listadoSituacionPlazaPk($obj->id_cat_situacion_plaza);
    $id_cat_puesto = catalogoPuestoPk($obj->id_cat_puesto);

    echo "<tr>
    <td><a href='../../view/Plazas/Listar.php?RP=$id_tbl_centro_trabajo&CP3=$id_tbl_control_plazas' class='btn btn-light' style='background-color: #cb9f52; border:none; outline:none; color: white'>Ir</a></td>
    <td>$obj->num_plaza</td>
    <td>$id_cat_tipo_contratacion</td>
    <td>$id_cat_puesto</td>
</tr>";
}

/*
if (pg_num_rows($listado) > 0) {
    $result = "con resultado";
} else {
    $result = "sin datos";
}

*/