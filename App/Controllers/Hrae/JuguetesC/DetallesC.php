<?php
include '../librerias.php';

$id_object_d = $_POST['id_object'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];

$modelJuguetesM = new ModelJuguetesM();
$catDependientesM = new CatDependientesM();
$catDependientesC = new CatDependientesC();
$catFechaJuguetesC = new CatFechaJuguetesC();
$catFechaJuguetesM = new CatFechaJuguetesM();
$catEstatusJuguetesC = new CatEstatusJuguetesC();
$catEstatusJuguetesM = new CatEstatusJuguetesM();

$row = new row();

if ($id_object_d != null) {
    $response = $row->returnArray($modelJuguetesM->listarEditById($id_object_d));
    $dependiente = $catDependientesC->selectByIdObject($catDependientesM->listarByAll($id_tbl_empleados_hraes),$row->returnArrayById($catDependientesM->obtenerElemetoById($response['id_ctrl_dependientes_economicos_hraes'])));
    $fecha = $catFechaJuguetesC ->selectById($catFechaJuguetesM->listarByAll(),$row->returnArrayById($catFechaJuguetesM->obtenerElemetoById($response['id_cat_fecha_juguetes'])));
    $estatus = $catEstatusJuguetesC->selectEstatusByIdObject($catEstatusJuguetesM->listarByAll(),$row->returnArrayById($catEstatusJuguetesM->obtenerElemetoById($response['id_cat_estatus_juguetes'])));
    $value = $row ->returnArray($catDependientesM->obtenerElemetoByCurp($response['id_ctrl_dependientes_economicos_hraes']));
    $var = [
        'response' => $response,
        'dependiente' => $dependiente,
        'fecha' => $fecha,
        'estatus' => $estatus,
        'value' => $value,
    ];
    echo json_encode($var);

} else {
    $response = $modelJuguetesM ->listarByNull();
    $dependiente = $catDependientesC->selectAll($catDependientesM->listarByAll($id_tbl_empleados_hraes));
    $fecha = $catFechaJuguetesC->selectAll($catFechaJuguetesM->listarByAll());
    $estatus = $catEstatusJuguetesC ->selectAll($catEstatusJuguetesM->listarByAll());
    $value = 'curp';
    $var = [
        'response' => $response,
        'dependiente' => $dependiente,
        'fecha' => $fecha,
        'estatus' => $estatus,
        'value' => $value,
    ];
    echo json_encode($var);
}
