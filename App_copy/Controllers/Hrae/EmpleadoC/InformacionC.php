<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$row = new Row();

$id_object = $_POST['id_tbl_empleados_hraes'];

$empleado = $row->returnArray($model->listarByIdEdit($id_object));

$nombre = $empleado['nombre'] . ' ' . $empleado['primer_apellido'] . ' ' . $empleado['segundo_apellido'];
$curp = $empleado['curp'];
$rfc = $empleado['rfc'];
$noEmpleado = $empleado['num_empleado'];


$var = [
    'nombre' => $nombre,
    'curp' => $curp,
    'rfc' => $rfc,
    'noEmpleado' => $noEmpleado
];

echo json_encode($var);