<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 

$cedula_profesional = $_POST['cedula_profesional']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'crtl_cedula_empleados', array(
    'id_tbl_empleados' => $id_tbl_empleados,
    'cedula_profesional' => $cedula_profesional
));

if ($pgs_QRY ) {
    header("Location: ../../view/Cedula/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}
