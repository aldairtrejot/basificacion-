<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$fecha = $_POST['fecha']; 
$hora_entradaCC = $_POST['hora_entrada']; 
$hora_salidaCC = $_POST['hora_salida']; 
$crypt = base64_encode ($id_tbl_empleados);

//Se para la hora concatenada
list($hora_entrada, $minuto_entrada) = explode(':', $hora_entradaCC);
list($hora_salida, $minuto_salida) = explode(':', $hora_salidaCC);


try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_retardo', array(
    'fecha' => $fecha,
    'hora_entrada' => $hora_entrada,  
    'minuto_entrada' => $minuto_entrada,
    'hora_salida' => $hora_salida,
    'minuto_salida' => $minuto_salida,
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/Retardo/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}
