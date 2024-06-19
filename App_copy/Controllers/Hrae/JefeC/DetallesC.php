<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelJefeM = new ModelJefeM();
$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelJefeM->listarByIdCedula($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelJefeM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
