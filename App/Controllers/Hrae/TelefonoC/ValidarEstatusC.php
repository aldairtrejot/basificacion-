<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$id_cat_estatus = $_POST['id_cat_estatus'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$inactivo = 0; ///catalogo id
$activo = 1; ///catalogo id
$modelTelefonoM = new ModelTelefonoM();
$row = new Row();

$result = $row->returnArrayById($modelTelefonoM->validarEstatus($activo, $id_object, $id_tbl_empleados_hraes));

$bool = true;
$message = 'ok';

if ($id_cat_estatus != $inactivo) {
    if ($result[0] != 0) {
        $bool = false;
        $message = 'Ya existen registros con estatus activo';
    }
}

$var = [
    'bool' => $bool,
    'message' => $message
];
echo json_encode($var);
