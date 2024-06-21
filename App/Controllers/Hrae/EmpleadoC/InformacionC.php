<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$row = new Row();
$modelMovimientosM = new ModelMovimientosM();

$id_object = $_POST['id_tbl_empleados_hraes'];

$empleado = $row->returnArray($model->listarByIdEdit($id_object));

$nombre = $empleado['nombre'] . ' ' . $empleado['primer_apellido'] . ' ' . $empleado['segundo_apellido'];
$curp = $empleado['curp'];
$rfc = $empleado['rfc'];
$noEmpleado = $empleado['num_empleado'];

$nivel = '';
$puesto = '';

$idPlazaEmpleado = $row->returnArrayById($modelMovimientosM->countEmpleadoPlaza($id_object));
if ($idPlazaEmpleado != 0){ ///tiene info
    $ultimoMovimiento = $row->returnArrayById($modelMovimientosM->ultimoMovimiento($id_object));
    if ($ultimoMovimiento[0] != 3) { ///distinto de baja
        $plazasX = $row->returnArrayById($modelMovimientosM->returnNivelesPuesto($ultimoMovimiento[1]));
        $puesto = $plazasX[0];
        $nivel = $plazasX[1];
    }
} else {

}

$var = [
    'nombre' => $nombre,
    'curp' => $curp,
    'rfc' => $rfc,
    'noEmpleado' => $noEmpleado,
    'nivel' => $nivel,
    'puesto' => $puesto
];

echo json_encode($var);