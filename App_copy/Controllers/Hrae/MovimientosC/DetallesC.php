<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelMovimientosM = new ModelMovimientosM();
$catMovimientoM = new CatMovimientoM();
$catSelectC = new CatSelectC();
$modelPlazasHraes = new modelPlazasHraes();
$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelMovimientosM->listarByEdit($id_object));
    $idMovimiento = $row->returnArrayById($catMovimientoM->listadoIdMovimiento($response['id_tbl_movimientos']));
    $general = $catSelectC->selectByEdit($catMovimientoM->listarByAllGeneral(),$row->returnArrayById($catMovimientoM->listarByIdGeneral($response['id_tbl_movimientos'])));
    $especifico = $catSelectC->selectByEditIX($catMovimientoM->obtenerByAllEspecifico($idMovimiento[0]),$row->returnArrayById($catMovimientoM->obtenerByIdEspecifico($response['id_tbl_movimientos'])));
    $plazas = $row->returnArrayById($modelPlazasHraes->listarByEditMovimiento($response['id_tbl_control_plazas_hraes']));
    $var = [
        'response' => $response,
        'general' => $general,
        'especifico' => $especifico,
        'num_plaza_m' => $plazas[0],
        'tipo_plaza_m' => $plazas[1],
        'unidad_responsable_m' => $plazas[2],
    ];
    echo json_encode($var);

} else {
    $response = $modelMovimientosM->listarByNull();
    $general = $catSelectC->selectByAllById($catMovimientoM->listarByAllGeneral(),2,0);
    $especifico = $catSelectC->selecStaticByNull();
    $var = [
        'response' => $response,
        'general' => $general,
        'especifico' => $especifico,
        'num_plaza_m' => null,
        'tipo_plaza_m' => null,
        'unidad_responsable_m' => null,
    ];
    echo json_encode($var);
}
