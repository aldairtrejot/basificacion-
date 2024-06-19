<?php
include '../librerias.php';

$id_objectTelefono = $_POST['id_object'];
$modelTelefonoM = new ModelTelefonoM();
$catalogoEstatusC = new catalogoEstatusC();
$catalogoEstatus = new catalogoEstatus();
$row = new row();

if ($id_objectTelefono != null) {
    $response = $row-> returnArray($modelTelefonoM->listarEditById($id_objectTelefono));
    $estatus = $catalogoEstatusC->returnCatEstatusByIdObject($catalogoEstatus->listarByAll(), $row->returnArrayById($catalogoEstatus->obtenerElemetoById($response['id_cat_estatus'])));
    $var = [
        'estatus' => $estatus,
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelTelefonoM->listarByNull();
    $estatus = $catalogoEstatusC->returnCatEstatus($catalogoEstatus->listarByAll());
    $var = [
        'estatus' => $estatus,
        'response' => $response,
    ];
    echo json_encode($var);
}
