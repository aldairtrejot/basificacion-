<?php
include '../librerias.php';

$id_ctrl_dependientes_economicos_hraes = $_POST['id_ctrl_dependientes_economicos_hraes'];
$row = new row();
$catDependientesM = new CatDependientesM();

$value = '';
$var = [
    'value' => $value,
];

if($id_ctrl_dependientes_economicos_hraes != null){
    $value = $row ->returnArray($catDependientesM->obtenerElemetoByCurp($id_ctrl_dependientes_economicos_hraes));
    $var = [
        'value' => $value,
    ];
} 
echo json_encode($var);

/*
if ($id_object_d != null) {
    $response = $row->returnArray($modelJuguetesM->listarEditById($id_object_d));
    $dependiente = $catDependientesC->selectByIdObject($catDependientesM->listarByAll($id_tbl_empleados_hraes),$row->returnArrayById($catDependientesM->obtenerElemetoById($response['id_ctrl_dependientes_economicos_hraes'])));
    $fecha = $catFechaJuguetesC ->selectById($catFechaJuguetesM->listarByAll(),$row->returnArrayById($catFechaJuguetesM->obtenerElemetoById($response['id_cat_fecha_juguetes'])));
    $estatus = $catEstatusJuguetesC->selectEstatusByIdObject($catEstatusJuguetesM->listarByAll(),$row->returnArrayById($catEstatusJuguetesM->obtenerElemetoById($response['id_cat_estatus_juguetes'])));
    $var = [
        'response' => $response,
        'dependiente' => $dependiente,
        'fecha' => $fecha,
        'estatus' => $estatus,
    ];
    echo json_encode($var);

} else {
    $response = $modelJuguetesM ->listarByNull();
    $dependiente = $catDependientesC->selectAll($catDependientesM->listarByAll($id_tbl_empleados_hraes));
    $fecha = $catFechaJuguetesC->selectAll($catFechaJuguetesM->listarByAll());
    $estatus = $catEstatusJuguetesC ->selectAll($catEstatusJuguetesM->listarByAll());
    $var = [
        'response' => $response,
        'dependiente' => $dependiente,
        'fecha' => $fecha,
        'estatus' => $estatus,
    ];
    
}
*/
