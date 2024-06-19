<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_ctrl_medios_contacto = $_POST['id_ctrl_medios_contacto']; 
$correo_electronico = $_POST['correo_electronico']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_medios_contacto' => $id_ctrl_medios_contacto
);

$arrayUpdate = array(
    'id_cat_estatus' => $id_cat_estatus,
    'correo_electronico' => $correo_electronico
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_medios_contacto', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/MediosContacto/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}