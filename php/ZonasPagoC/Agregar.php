<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$codigo = $_POST['codigo']; 
$rfc = $_POST['rfc']; 
$id_cat_unidad_responsable = $_POST['id_cat_unidad_responsable']; 
$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo']; 
$cryp = base64_encode($id_tbl_centro_trabajo);

try{
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_zonas_pago', array(
    'codigo' => $codigo,
    'rfc' => $rfc,
    'id_cat_unidad_responsable' => $id_cat_unidad_responsable,
    'id_tbl_centro_trabajo' => $id_tbl_centro_trabajo,
));

if ($pgs_QRY ) {
    header("Location: ../../view/ZonasPago/Listar.php?D-F=$cryp"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}