<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_ctrl_cedula_empleados = $_POST['id_ctrl_cedula_empleados']; 

$cedula_profesional = $_POST['cedula_profesional']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_cedula_empleados' => $id_ctrl_cedula_empleados
);

$arrayUpdate = array(
    'cedula_profesional' => $cedula_profesional
);
$pgs_QRY = pg_update($connectionDBsPro, 'crtl_cedula_empleados', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Cedula/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}