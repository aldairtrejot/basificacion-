<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_turno = base64_decode($_GET['D-F2']);
$id_tbl_control_plazas = $_GET['D-F3'];
$crypt = base64_encode($id_tbl_empleados);

if (isset($id_ctrl_turno)) {
    try {
        $pgs_QRY = pg_delete(
            $connectionDBsPro,
            'ctrl_turno',
            array(
                'id_ctrl_turno' => $id_ctrl_turno
            )
        );
        if ($pgs_QRY) {
            header("Location: ../../view/Jornada/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
        } else {
            $messageError = base64_encode($messageError = 1);
            header("Location: ../../view/Jornada/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas.'&MS3='.$messageError.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
        }
    } catch (\Throwable $th) {
        header("Location: error.php" . $th); //Muestra error
    }
}
