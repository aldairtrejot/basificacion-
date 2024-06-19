<?php
include '../librerias.php';

$id_cat_concepto = $_POST['id_cat_concepto'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$id_object = $_POST['id_object'];

$row = new row();
$modelPercepcionesM = new ModelPercepcionesM();
$catConceptoM = new CatConceptoM();

$count = $row->returnArrayById($modelPercepcionesM->validarConcepto($id_cat_concepto,$id_tbl_empleados_hraes,$id_object));
$conceptoNombre = $row->returnArrayById($catConceptoM->listarByName($id_cat_concepto));

$message = 'Ya existe el registro ';
$bool = false;

if ($count[0] != 0){
    $bool = true;
    $message .= $conceptoNombre[1];
}

$var = [
    'message' => $message,
    'bool' => $bool,
];
echo json_encode($var);