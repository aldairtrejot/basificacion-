<?php
include '../librerias.php';

$id_objectEmergencia = $_POST['id_object'];
$modelEmergenciaM = new ModelEmergenciaM();
$catalogoEstatusC = new catalogoEstatusC();
$catalogoEstatus = new catalogoEstatus();
$row = new row();

if ($id_objectEmergencia != null) {
    $response = $row->returnArray($modelEmergenciaM->listarEditById($id_objectEmergencia));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelEmergenciaM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
