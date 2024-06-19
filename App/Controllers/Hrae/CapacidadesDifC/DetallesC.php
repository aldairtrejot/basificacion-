<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$catCapacidadC = new CatCapacidadC();
$catCapacidadM = new CatCapacidadM();
$modelCapacidadesM = new ModelCapacidadesM();
$row = new Row();

if ($id_object != null){
    $response = $row->returnArray($modelCapacidadesM->listarByIdCap($id_object));
    $capacidad = $catCapacidadC->selectByIdObject($catCapacidadM->listarByAll(),$row->returnArrayById($catCapacidadM->obtenerElemetoById($response['id_cat_capacidad_dif_hraes'])));
    $var = [
        'capacidad' => $capacidad,
    ];
    echo json_encode($var);
} else {
    $capacidad = $catCapacidadC->selectAll($catCapacidadM->listarByAll());
    $var = [
        'capacidad' => $capacidad,
    ];
    echo json_encode($var);
}
