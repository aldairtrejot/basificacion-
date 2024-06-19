<?php
include '../../../../conexion.php';
include '../librerias.php';

$modelDatosEmpleadoM = new modelDatosEmpleadoM;
$catalogoGeneroC = new CatalogoGeneroC();
$catalogoGeneroM = new CatalogoGeneroM();
$catEstadoCivilC = new CatEstadoCivilC();
$catEstadoCivilM = new CatEstadoCivilM();
$row = new row();

$id_object = $_POST['id_object'];

$listado = $row -> returnArrayById($modelDatosEmpleadoM->countDatosEmpleado($id_object));
if($listado[0] != 0){ ///MODIFICAR
    $response = $row -> returnArray($modelDatosEmpleadoM -> listarByIdEdit($id_object));
    $genero = $catalogoGeneroC->selectById($catalogoGeneroM->listarByAll(),$row->returnArrayById($catalogoGeneroM->obtenerElemetoById($response['id_cat_genero_hraes'])));
    $estadoCivil = $catEstadoCivilC->selectById($catEstadoCivilM->listarByAll(),$row->returnArrayById($catEstadoCivilM->obtenerElemetoById($response['id_cat_estado_civil_hraes'])));
    $var = [
        'response' => $response,
        'genero' => $genero,
        'estadoCivil' => $estadoCivil,
    ];
    echo json_encode($var);
} else { ///AGREGAR
    $response = $modelDatosEmpleadoM->listarByNull();
    $genero = $catalogoGeneroC ->selectByAll($catalogoGeneroM ->listarByAll());
    $estadoCivil = $catEstadoCivilC->selectByAll($catEstadoCivilM->listarByAll());
    $var = [
        'response' => $response,
        'genero' => $genero,
        'estadoCivil' => $estadoCivil,
    ];
    echo json_encode($var);
}

