<?php
include '../librerias.php';

$row = new Row();
$modelPlazasHraes = new modelPlazasHraes();

$id_tbl_control_plazas_hraes = $_POST['id_tbl_control_plazas_hraes'];

$detallesPlaza = $row->returnArrayById($modelPlazasHraes->infoPlazaCentro($id_tbl_control_plazas_hraes));
$var = [
    'contratacion' => $detallesPlaza[1],
    'centroTrabajo' => $detallesPlaza[2],
    'situacionPlaza' => $detallesPlaza[3],
];

echo json_encode($var);

