<?php
include '../librerias.php';


///VARIABLES DE CATALOGO tbl_movimientos
$baja = 3;
$alta = 1;
$movimiento = 2;

$modelEmpleadosHraes = new modelEmpleadosHraes();
$modelPlazasHraes = new modelPlazasHraes();
$modelMovimientosM = new ModelMovimientosM();
$row = new Row();
$id_tbl_control_plazas_hraes = $_POST['id_tbl_control_plazas_hraes'];

$countPlaza = $row->returnArrayById($modelMovimientosM->listarCountPlaza($id_tbl_control_plazas_hraes));

$empleado = $modelEmpleadosHraes->listarByNull();
$entity = $row->returnArrayById($modelPlazasHraes->detallesPlazas($id_tbl_control_plazas_hraes));

if ($countPlaza[0] != 0) {
    $reponse = $row->returnArrayById($modelPlazasHraes->ultimoMovimientoPlaza($id_tbl_control_plazas_hraes));
    if ($reponse[0] != $baja) { ///MOSTRAR INFO DE EMPLEADO
        $empleado = $row->returnArray($modelEmpleadosHraes->listarByIdEdit($reponse[2]));
    } 
}

$var = [
    'entity' => $entity,
    'empleado' => $empleado,
];
echo json_encode($var);
