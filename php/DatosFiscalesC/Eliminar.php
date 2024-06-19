<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_datos_fiscales = base64_decode($_GET['D-F']); //Se obtiene el valor de datos fiscales 

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'tbl_datos_fiscales',
    array(
        'id_tbl_datos_fiscales' => $id_tbl_datos_fiscales
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/DatosFiscales/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

