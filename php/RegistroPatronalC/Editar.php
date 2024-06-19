<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$registro_patronal = $_POST["registro_patronal"]; 
$id_tbl_registro_patronal = $_POST["id_tbl_registro_patronal"]; 
$crypt = base64_encode($_POST["crypt"]); 


try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_registro_patronal' => $id_tbl_registro_patronal
);

$arrayUpdate = array(
    'registro_patronal' => $registro_patronal
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_registro_patronal', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/RegistroPatronal/Listar.php?D-F=$crypt"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}