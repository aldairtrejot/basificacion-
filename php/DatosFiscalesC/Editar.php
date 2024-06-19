<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_datos_fiscales = $_POST["id_tbl_datos_fiscales"]; //Se obtiene el valor de id_tbl_datos_fiscales
$rfc = $_POST["rfc"];  // Se obtiene el valor de rfc
$curp = $_POST["curp"]; //Se obtiene el valor de curp
$registro_patronal = $_POST["registro_patronal"]; //Se obtiene el valor de registro_patronal
$codigo_postal = $_POST["codigo_postal"]; //Se obtiene el valor de codigo_postal
$id_cat_regimen_fiscal = $_POST["id_cat_regimen_fiscal"]; //Se obtiene el valor de id_cat_regimen_fiscal
$nombre_razon_social = $_POST["nombre_razon_social"]; //Se obtiene el valor de cnombre_razon_social

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_datos_fiscales' => $id_tbl_datos_fiscales
);

$arrayUpdate = array(
    'rfc' => $rfc,
    'curp' => $curp,
    'registro_patronal' => $registro_patronal,
    'codigo_postal' => $codigo_postal,
    'id_cat_regimen_fiscal' => $id_cat_regimen_fiscal,
    'nombre_razon_social' => $nombre_razon_social
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_datos_fiscales', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/DatosFiscales/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}