<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$rfc = $_POST['rfc']; //Se obtiene el valor de rfc
$curp = $_POST['curp']; //Se obtiene el valor de nombre
$registro_patronal = $_POST['registro_patronal']; //Se obtiene el valor de registro_patronal
$codigo_postal = $_POST['codigo_postal']; //Se obtiene el valor de codigo_postal
$id_cat_regimen_fiscal = $_POST['id_cat_regimen_fiscal']; //Se obtiene el valor de id_cat_regimen_fiscal
$nombre_razon_social = $_POST['nombre_razon_social']; //Se obtiene el valor de nombre_razon_social

try {
//Se ejecuta la funcion insert SQL, para agregar usuarios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_datos_fiscales', array(
    'rfc' => $rfc,
    'curp' => $curp,   
    'registro_patronal' => $registro_patronal,
    'codigo_postal' => $codigo_postal,
    'id_cat_regimen_fiscal' => $id_cat_regimen_fiscal,
    'nombre_razon_social' => $nombre_razon_social
));

if ($pgs_QRY ) {
    header("Location: ../../view/DatosFiscales/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}