<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';
include '../../../View/validar_sesion.php';
include '../../../Model/Hraes/BitacoraM/BitacoraM.php';

date_default_timezone_set('America/Mexico_City');
$id_id_tbl_empleados_hraes = $_POST['id_object'];
$bitacoraM = new BitacoraM();

$fechaHoraActual = new DateTime();
$fechaHoraActual->modify('-1 hour');
$fecha = $fechaHoraActual->format('Y-m-d');
$hora = $fechaHoraActual->format('H:i:s');

$save = pg_query("INSERT INTO ctrl_asistencia_bas (fecha, hora, id_tbl_empleados_hraes)
                  SELECT CURRENT_DATE, CURRENT_TIME, $id_id_tbl_empleados_hraes;");


$condicion = [
    'id_tbl_empleados_hraes' => $id_id_tbl_empleados_hraes,
    'fecha' => $fecha,
    'hora' =>$hora,
];

$dataBitacora = [
    'nombre_tabla' => 'ctrl_asistencia_bas',
    'accion' => 'AGREGAR',
    'valores' => json_encode($condicion),
    'fecha' => $timestamp,
    'id_users' => $_SESSION['id_user']
];

$bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');

if ($save) {
    echo 'success';
} else {
    echo 'error';
}


/*
$array = [
    'fecha' => $fecha,
    'id_tbl_empleados_hraes' => $id_id_tbl_empleados_hraes,
];

$guardar = pg_insert($connectionDBsPro, 'asistencia_bas', $array);

if ($guardar) {
    echo 'success';
} else {
    echo 'error';
}


*/

/*
$model = new modelEmpleadosHraes();
$bitacoraM = new BitacoraM();
$tablaEmpleados = 'tbl_empleados_hraes';

$condicion = [
    'id_tbl_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => $tablaEmpleados,
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'delete';
    }
} 
*/