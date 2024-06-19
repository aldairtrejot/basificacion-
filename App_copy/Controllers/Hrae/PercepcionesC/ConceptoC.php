<?php
include '../librerias.php';

$id_cat_concepto = $_POST['id_cat_concepto'];

$catValoresM = new  CatValoresM();
$catValoresC = new CatValoresC();
$catSelectC = new CatSelectC();
$row = new row();

if($id_cat_concepto != null){
    $valor = $catValoresC->selectByAll($catValoresM->listarByAll($id_cat_concepto));
    $var = [
        'valor' => $valor,
    ];
    echo json_encode($var);
} else {
    $valor = $catSelectC->selecStaticByNull();
    $var = [
        'valor' => $valor,
    ];
    echo json_encode($var);
}
