<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$registro_patronal = $_POST['registro_patronal']; 
$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo']; 
$cryp = base64_encode($id_tbl_centro_trabajo);

try{
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_registro_patronal', array(
    'registro_patronal' => $registro_patronal,
    'id_tbl_centro_trabajo' => $id_tbl_centro_trabajo
));

if ($pgs_QRY ) {
    header("Location: ../../view/RegistroPatronal/Listar.php?D-F=$cryp"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}