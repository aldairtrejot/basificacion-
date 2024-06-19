<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_centro_trabajo = base64_decode($_GET['CT']); //Se obtiene el valor de CT encript 

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'tbl_centro_trabajo',
    array(
        'id_tbl_centro_trabajo' => $id_tbl_centro_trabajo
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/CentroTrabajo/Listar.php"); //Regreso a la tabla
} else{
    $messageError = base64_encode($messageError = 1);
    header("Location: ../../view/CentroTrabajo/Listar.php?MS3=".$messageError); //Regreso a la tabla
}
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

