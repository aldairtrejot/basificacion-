<?php
include("Listar.php");
include("../PlazasC/Listar.php");
$idSearch = $_POST['idSearch'];
$listado = listadoLikeEmp($idSearch);

function concatValue($value1, $value2){
    return $value1 .' '. $value2;
}
echo "
<thead>
<tr style='background-color: #5c5c5c; width:100%;'>
    <th style='color: white;'>Menu</th>
    <th style='color: white;'>CURP</th>
    <th style='color: white;'>RFC</th>
    <th style='color: white;'>Nombre</th>
    <th style='color: white;'>Apellidos</th>
    </tr>
</thead>";

while ($obj = pg_fetch_object($listado)) {
    $apellidos = concatValue($obj->primer_apellido,$obj->segundo_apellido);
    $id_tbl_centro_trabajo = base64_encode(listarIdPlazasCentro($obj->id_tbl_empleados));
    $id_tbl_control_plazas = base64_encode(listarIdControlPlazas($obj->id_tbl_empleados));
    echo "<tr>
    <td><a href='../../view/Empleados/Listar.php?D-F3=$id_tbl_control_plazas&RP=$id_tbl_centro_trabajo' class='btn btn-light' style='background-color: #cb9f52; border:none; outline:none; color: white'>Ir</a></td>
    <td>$obj->curp</td>
    <td>$obj->rfc</td>
    <td>$obj->nombre</td>
    <td>$apellidos</td>
</tr>";
}

/*
if (pg_num_rows($listado) > 0) {
    $result = "con resultado";
} else {
    $result = "sin datos";
}

*/