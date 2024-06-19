<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_ctrl_cuenta_clabe = $_POST['id_ctrl_cuenta_clabe']; 
$clabe = $_POST['clabe']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$id_cat_banco = $_POST['id_cat_banco']; 
$id_cat_formato_pago = $_POST['id_cat_formato_pago']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_cuenta_clabe' => $id_ctrl_cuenta_clabe
);

$arrayUpdate = array(
    'clabe' => $clabe,
    'id_cat_estatus' => $id_cat_estatus,  
    'id_cat_banco' => $id_cat_banco,  
    'id_cat_formato_pago' => $id_cat_formato_pago,
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_cuenta_clabe', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/CuentaClabe/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}