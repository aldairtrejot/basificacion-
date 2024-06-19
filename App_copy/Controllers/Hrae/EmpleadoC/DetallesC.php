<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$row = new Row();
$catalogoGeneroM = new CatalogoGeneroMHraes();
$catalogoGeneroC = new CatalogoGeneroCHraes();
$catEstadoCivilM = new CatEstadoCivilM();
$catEstadoCivilC = new CatEstadoCivilC();

$id_object = $_POST['id_object'];

if ($id_object != null) {
    $response = $row->returnArray($model -> listarByIdEdit($id_object));
    $estadoCivil = $catEstadoCivilC->selectById($catEstadoCivilM->listarByAll(),$row->returnArrayById($catEstadoCivilM->obtenerElemetoById($response['id_cat_estado_civil'])));
    $genero = $catalogoGeneroC->selectById($catalogoGeneroM->listarByAll(),$row->returnArrayById($catalogoGeneroM->listarElemetoById($response['id_cat_genero_hraes'])));
    $var = [
        'response' => $response,
        'genero' => $genero,
        'estadoCivil' => $estadoCivil,
    ];
    echo json_encode($var);

} else {
    $response = $model->listarByNull();
    $genero = $catalogoGeneroC->selectByAll($catalogoGeneroM->listarByAll());
    $estadoCivil = $catEstadoCivilC->selectByAll($catEstadoCivilM->listarByAll());
    $var = [
        'response' => $response,
        'genero' => $genero,
        'estadoCivil' => $estadoCivil,
    ];
    echo json_encode($var);
}
