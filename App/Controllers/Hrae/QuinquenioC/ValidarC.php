<?php
include '../librerias.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$id_object = $_POST['id_object'];

$row = new row();
$modelQuinquenioM = new ModelQuinquenioM();

$count = $row->returnArrayById($modelQuinquenioM ->validarQuinquenio($id_tbl_empleados_hraes,$id_object));

$message = 'Ya existe un registro de quinquenio';
$bool = false;

if ($count[0] != 0){
    $bool = true;
}

$var = [
    'message' => $message,
    'bool' => $bool,
];
echo json_encode($var);
