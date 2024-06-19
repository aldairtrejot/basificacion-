<?php
include '../librerias.php';

$id_object = $_POST['id_object'];

$modelQuinquenioM = new ModelQuinquenioM();
$catQuinquenioC = new CatQuinquenioC();
$catQuinquenioM = new CatQuinquenioM();

$row = new row();

if($id_object != null){
    $response = $row ->returnArray($modelQuinquenioM->listarEditById($id_object));
    $quinquenio = $catQuinquenioC->selectById($catQuinquenioM->listarByAll(),$row->returnArrayById($catQuinquenioM->listarElemetoById($response['id_cat_quinquenio'])));
    $var = [
        'response' => $response,
        'quinquenio' => $quinquenio,
    ];
    echo json_encode($var);
} else {
    $response = $modelQuinquenioM->listarByNull();
    $quinquenio = $catQuinquenioC->selectByAll($catQuinquenioM->listarByAll());
    $var = [
        'response' => $response,
        'quinquenio' => $quinquenio,
    ];
    echo json_encode($var);
}
