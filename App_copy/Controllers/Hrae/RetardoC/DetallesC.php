<?php
include '../librerias.php';

$id_objectDependiente = $_POST['id_object'];
$modelRetardoM = new ModelRetardoM();
$row = new row();

if ($id_objectDependiente != null) {
    $response = $row->returnArray($modelRetardoM->listarEditById($id_objectDependiente));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelRetardoM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
