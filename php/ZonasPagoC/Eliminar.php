<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db


$id_tbl_centro_trabajo = base64_decode($_GET['D-F']); 
$id_tbl_zonas_pago = base64_decode($_GET['D-F2']); 
$crypt = base64_encode($id_tbl_centro_trabajo);

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'tbl_zonas_pago',
    array(
        'id_tbl_zonas_pago' => $id_tbl_zonas_pago
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/ZonasPago/Listar.php?D-F=$crypt"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}
