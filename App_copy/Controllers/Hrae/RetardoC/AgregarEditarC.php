<?php
include '../librerias.php';

$modelRetardoM = new ModelRetardoM();
$h1 = $_POST['hora_entrada'];
$h2 = $_POST['hora_salida'];
$bitacoraM = new BitacoraM();
list($hora_entrada, $minuto_entrada) = explode(':', $h1);
list($hora_salida, $minuto_salida) = explode(':', $h2);

$condicion = [
    'id_ctrl_retardo_hraes' => $_POST['id_object']
];

$datos = [
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'fecha' => $_POST['fecha_retardo'],
    'hora_entrada' => $hora_entrada,
    'minuto_entrada' => $minuto_entrada,
    'hora_salida' => $hora_salida,
    'minuto_salida' => $minuto_salida
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelRetardoM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_retardo_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelRetardoM ->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_retardo_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}

