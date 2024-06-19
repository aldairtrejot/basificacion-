<?php
include '../librerias.php';

$modelCamposPersM = new ModelCamposPersM();
$row = new Row();

$id_object = $_POST['id_object'];
$camposPerson = $row->returnArrayById($modelCamposPersM->selectCountById($id_object));

if ($camposPerson[0] != 0) {
    $response = $row -> returnArray($modelCamposPersM ->listarByIdEdit($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelCamposPersM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}