<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_tabuladores = base64_decode($_GET['CT']); //Se obtiene el valor de CT encript 

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'tbl_tabuladores',
    array(
        'id_tbl_tabuladores' => $id_tbl_tabuladores
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/Tabuladores/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

