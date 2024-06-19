<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_ctrl_turno = $_POST['id_ctrl_turno']; 
$id_cat_turno = $_POST['id_cat_turno']; 
$id_cat_horario = $_POST['id_cat_horario']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_turno' => $id_ctrl_turno
);

$arrayUpdate = array(
    'id_cat_turno' => $id_cat_turno,
    'id_cat_horario' => $id_cat_horario,
    'id_cat_estatus' => $id_cat_estatus
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_turno', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Jornada/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}