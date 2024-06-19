<?php
include '../librerias.php';

$AdicionalM = new AdicionalM();
$row = new Row();

$id_object = $_POST['id_object'];

$count = $row->returnArrayById($AdicionalM->selectCountById($id_object));

if ($count[0] != 0){ //edit
    $response = $row -> returnArray($AdicionalM->listarByIdEdit($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
} else { //add
    $response = $AdicionalM->listarByNull();
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);
}
