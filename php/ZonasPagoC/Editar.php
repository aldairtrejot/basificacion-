<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST["id_tbl_centro_trabajo"]; 
$id_tbl_zonas_pago = $_POST["id_tbl_zonas_pago"]; 
$codigo = $_POST["codigo"]; 
$rfc = $_POST["rfc"]; 
$id_cat_unidad_responsable = $_POST["id_cat_unidad_responsable"]; 
$crypt = base64_encode($id_tbl_centro_trabajo); 


try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_zonas_pago' => $id_tbl_zonas_pago
);

$arrayUpdate = array(
    'codigo' => $codigo,
    'rfc' => $rfc,
    'id_cat_unidad_responsable' => $id_cat_unidad_responsable
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_zonas_pago', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/ZonasPago/Listar.php?D-F=$crypt"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}