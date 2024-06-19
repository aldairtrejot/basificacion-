<?php
include '../librerias.php';

$modelUsuariosM = new UsuariosM();
$catRolC = new CatRolC();
$catRolM = new CatRolM();
$row = new Row();

$id_object = $_POST['id_object'];

if ($id_object != null) {
    $response = $row->returnArray($modelUsuariosM->listarByIdEdit($id_object));
    $rol = $catRolC ->selectById($catRolM->listarByAll(),$row->returnArrayById($catRolM->listarById($response['id_rol'])));
    $var = [
        'response' => $response,
        'rol' => $rol,
    ];
    echo json_encode($var);

} else {
    //$region = $catalogoRegionC->returnCatRegion($catalogoRegion->listarByAll());
    $rol = $catRolC->selectAll($catRolM->listarByAll());
    $response = $modelUsuariosM->listarByNull();
    $var = [
        'response' => $response,
        'rol' => $rol,
    ];
    echo json_encode($var);
}

