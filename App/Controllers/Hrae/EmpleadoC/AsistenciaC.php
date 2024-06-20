<?php 
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';
include '../../../View/validar_sesion.php';
include '../../../Model/Hraes/BitacoraM/BitacoraM.php';

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");
$id_id_tbl_empleados_hraes = $_POST['id_object'];

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