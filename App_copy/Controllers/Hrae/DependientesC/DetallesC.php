<?php
include '../librerias.php';

$id_objectDependiente = $_POST['id_object'];
$modelDependientesM = new ModelDependientesM();
$catalogoDependientesM = new CatalogoDependientesM();
$catalogoDependientesC = new CatalogoDependientesC();
$row = new row();

if ($id_objectDependiente != null) {
    $response = $row->returnArray($modelDependientesM->listarEditById($id_objectDependiente));
    $dependiente = $catalogoDependientesC->selectById($catalogoDependientesM->listarByAll(),$row->returnArrayById($catalogoDependientesM->obtenerElemetoById($response['id_cat_dependientes_economicos'])));
    $var = [
        'dependiente' => $dependiente,
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelDependientesM->listarByNull();
    $dependiente = $catalogoDependientesC->selectAll($catalogoDependientesM->listarByAll());
    $var = [
        'dependiente' => $dependiente,
        'response' => $response,
    ];
    echo json_encode($var);
}
