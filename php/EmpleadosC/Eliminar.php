<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_empleados = base64_decode($_GET['CT']); //Se obtiene el valor de CT encript 
$id_tbl_centro_trabajo = ($_GET['RP']);
$crypt = $_GET['D-F3'];

if (isset($id_tbl_empleados)) {
    try {
        $pgs_QRY = pg_delete(
            $connectionDBsPro,
            'tbl_empleados',
            array(
                'id_tbl_empleados' => $id_tbl_empleados
            )
        );
        if ($pgs_QRY) {
            header("Location: ../../view/Empleados/Listar.php?D-F3=" . $crypt.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
        } else {
            $messageError = base64_encode($messageError = 1);
            header("Location: ../../view/Empleados/Listar.php?D-F3=" . $crypt.'&MS3='.$messageError.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
        }
    } catch (\Throwable $th) {
        header("Location: error.php" . $th); //Muestra error
    }
}
