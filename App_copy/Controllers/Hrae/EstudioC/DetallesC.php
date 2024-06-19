<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$catEstudioC = new CatEstudioC();
$catEstudioM = new CatEstudioM();
$modelEstudioM = new ModelEstudioM();
$row = new Row();

if ($id_object != null){
    $response = $row->returnArray($modelEstudioM->listarByIdEdit($id_object));
    $estudio = $catEstudioC ->selectById($catEstudioM->listarByAll(),$row->returnArrayById($catEstudioM->listarElemetoById($response['id_cat_nivel_estudios'])));
    $var = [
        'estudio' => $estudio,
    ];
    echo json_encode($var);
} else {
    $estudio = $catEstudioC ->selectByAll($catEstudioM->listarByAll());
    $var = [
        'estudio' => $estudio,
    ];
    echo json_encode($var);
}
