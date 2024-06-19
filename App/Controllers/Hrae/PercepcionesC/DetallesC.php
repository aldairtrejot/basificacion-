<?php
include '../librerias.php';

$id_object = $_POST['id_object'];

$modelPercepcionesM = new ModelPercepcionesM();
$catConceptoM = new CatConceptoM();
$catConceptoC = new CatConceptoC();
$catSelectC = new CatSelectC();
$catValoresM = new  CatValoresM();
$CatValoresC = new CatValoresC();
$row = new row();

if ($id_object != null) {
    $response = $row->returnArray($modelPercepcionesM->listarEditById($id_object));
    $concepto = $catConceptoC->selectById($catConceptoM->listarByAll(),$row->returnArrayById($catConceptoM->listarById($response['id_cat_valores'])));
    $idConcepto = $row->returnArrayById($catValoresM->listarByIdConcepto($response['id_cat_valores']));
    $valor = $CatValoresC->selectById($catValoresM->listarByAll($idConcepto[0]),$row->returnArrayById($catValoresM->listarById($response['id_cat_valores'])));
    $var = [
        'response' => $response,
        'concepto' => $concepto,
        'idConcepto' => $idConcepto,
        'valor' => $valor,
    ];
    echo json_encode($var);

} else {
    $response = $modelPercepcionesM->listarByNull();
    $concepto = $catConceptoC->selectByAll($catConceptoM->listarByAll());
    $valor = $catSelectC->selecStaticByNull();
    $var = [
        'response' => $response,
        'concepto' => $concepto,
        'valor' => $valor,
    ];
    echo json_encode($var);
}
