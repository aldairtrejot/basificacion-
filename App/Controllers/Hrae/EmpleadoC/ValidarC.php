<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$row = new Row();

$id_object = $_POST['id_object'];
$rfc = $_POST['rfc'];
$curp = $_POST['curp'];
$numEmpleado = $_POST['numEmpleado'];

$rfcCount = $row->returnArrayById($model->validarRfc($rfc,$id_object));
$curpCount = $row->returnArrayById($model->validarCurp($curp,$id_object));
$numEmpleadoCount = $row->returnArrayById($model->validarNoEmpleado($numEmpleado,$id_object));

$bool = true;
$message = 'ok';
if ($rfcCount[0] != 0) {
    $bool = false;
    $message = 'Ya exite un registro con el rfc capturado';
}
if ($curpCount[0] != 0) {
    $bool = false;
    $message = 'Ya exite un registro con la curp capturada';
}
if ($numEmpleadoCount[0] != 0) {
    $bool = false;
    $message = 'Ya exite un registro con el No. Empleado capturado';
}

$var = [
    'bool' => $bool,
    'message' => $message,
];

echo json_encode($var);