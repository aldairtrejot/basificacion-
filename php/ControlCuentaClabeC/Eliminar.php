<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_ctrl_cuenta_clabe = base64_decode($_GET['D-F2']); 
$crypt = base64_encode ($id_tbl_empleados);

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'ctrl_cuenta_clabe',
    array(
        'id_ctrl_cuenta_clabe' => $id_ctrl_cuenta_clabe
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/CuentaClabe/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} else {$messageError = base64_encode(1);
    header("Location: ../../view/CuentaClabe/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&MS3='.$messageError.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
}
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

