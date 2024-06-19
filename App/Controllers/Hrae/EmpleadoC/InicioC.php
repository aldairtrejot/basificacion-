<?php

include '../librerias.php';

$modelEmpleadosHraes = new modelEmpleadosHraes();
$row = new Row();

$empleados = $row->returnArrayById($modelEmpleadosHraes->empleadosCountAll());
$masculino = $row->returnArrayById($modelEmpleadosHraes->generoEmpleados('H'));
$femenino = $row->returnArrayById($modelEmpleadosHraes->generoEmpleados('M'));

$var = [
    'empleados' => $empleados[0],
    'masculino' => $masculino[0],
    'femenino' => $femenino[0],
];
echo json_encode($var);
