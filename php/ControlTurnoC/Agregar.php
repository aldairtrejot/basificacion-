<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_cat_turno = $_POST['id_cat_turno']; 
$id_cat_horario = $_POST['id_cat_horario']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_turno', array(
    'id_cat_estatus' => $id_cat_estatus,  
    'id_cat_horario' => $id_cat_horario,
    'id_cat_turno' => $id_cat_turno,
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/Jornada/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}