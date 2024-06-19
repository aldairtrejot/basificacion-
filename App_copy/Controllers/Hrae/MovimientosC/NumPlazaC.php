<?php
include '../librerias.php';

$row = new Row();
$modelPlazasHraes = new modelPlazasHraes();

$num_plaza_m = $_POST['num_plaza_m'];
$count = $row->returnArrayById($modelPlazasHraes->listarCountByNum($num_plaza_m));

if ($count[0] != 0){//Exists
    $response = $row->returnArrayById($modelPlazasHraes->listarNumPlazaUResp($num_plaza_m));
    $var = [
        'tipo_plaza' => $tipo_plaza = $response[2],
        'unidad_responsable' => $unidad_responsable = $response[3],
        'id_tipo_plaza' => $id_tipo_plaza = $response[1],
        'id_plaza' => $id_plaza = $response[0],
    ];
} else {
    $var = [
        'tipo_plaza' => $tipo_plaza = 'No encontrado',
        'unidad_responsable' => $unidad_responsable = 'No encontrado',
        'id_tipo_plaza' => $id_tipo_plaza = null,
        'id_plaza' => $id_plaza = null,
    ];
}
echo json_encode($var);

