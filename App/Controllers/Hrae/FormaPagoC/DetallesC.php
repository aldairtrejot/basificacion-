<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelFormaPagoM = new ModelFormaPagoM();
$catFormatoPagoM = new CatFormatoPagoM();
$catformatoPagoC = new CatformatoPagoC();
$catalogoEstatusC = new catalogoEstatusC();
$catalogoEstatus = new catalogoEstatus();
$catBancoM = new CatBancoM();

$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelFormaPagoM->listarByIdFormaPago($id_object));
    $estatus = $catalogoEstatusC->returnCatEstatusByIdObject($catalogoEstatus->listarByAll(),$row->returnArrayById($catalogoEstatus->obtenerElemetoById($response['id_cat_estatus'])));
    $formatoPago = $catformatoPagoC->selectById($catFormatoPagoM ->listarByAll(),$row->returnArrayById($catFormatoPagoM->obtenerElemetoById($response['id_cat_formato_pago'])));
    $listadoBanco = $row->returnArray($catBancoM->listarByIdCatBanco($response['id_cat_banco']));
    $banco = $listadoBanco['nombre'];
    $var = [
        'banco' => $banco,
        'response' => $response,
        'estatus' => $estatus,
        'formatoPago' => $formatoPago,
    ];
    echo json_encode($var);

} else {
    $response = $modelFormaPagoM->listarByNull();
    $estatus = $catalogoEstatusC->returnCatEstatus($catalogoEstatus->listarByAll());
    $formatoPago = $catformatoPagoC->selectAll($catFormatoPagoM->listarByAll());
    $banco = null;
    $var = [
        'banco' => $banco,
        'response' => $response,
        'estatus' => $estatus,
        'formatoPago' => $formatoPago,
    ];
    echo json_encode($var);
}
