<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_ctrl_retardo = $_POST['id_ctrl_retardo']; 
$fecha = $_POST['fecha']; 
$hora_entradaT = $_POST['hora_entrada']; 
$hora_salidaT = $_POST['hora_salida']; 
$crypt = base64_encode($id_tbl_empleados);

//Se para la hora concatenada
list($hora_entrada, $minuto_entrada) = explode(':', $hora_entradaT);
list($hora_salida, $minuto_salida) = explode(':', $hora_salidaT);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_retardo' => $id_ctrl_retardo
);

$arrayUpdate = array(
    'fecha' => $fecha,
    'hora_entrada' => $hora_entrada,
    'minuto_entrada' => $minuto_entrada,
    'minuto_salida' => $minuto_salida,
    'hora_salida' => $hora_salida
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_retardo', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Retardo/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}