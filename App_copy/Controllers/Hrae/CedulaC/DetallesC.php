<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelCedulaM = new ModelCedulaM();
$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelCedulaM->listarByIdCedula($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelCedulaM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
