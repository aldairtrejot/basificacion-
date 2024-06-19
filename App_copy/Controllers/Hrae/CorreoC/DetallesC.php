<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelCorreoM = new ModelCorreoM();
$row = new row();

if ($id_object != null) {
    $response = $row->returnArray($modelCorreoM->listarByIdEdit($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelCorreoM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
