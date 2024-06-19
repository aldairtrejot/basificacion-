<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_ctrl_juguetes = base64_decode($_GET['D-F2']); 
$crypt = base64_encode ($id_tbl_empleados);

try {
    eliminarCtrlJuguetes($connectionDBsPro, $id_ctrl_juguetes);
    header("Location: ../../view/Juguetes/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla

} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

function eliminarCtrlJuguetes($connectionDBsPro, $id_ctrl_juguetes){
    $pgs_QRY = pg_delete(
        $connectionDBsPro,
        'ctrl_juguetes',
        array(
            'id_ctrl_juguetes' => $id_ctrl_juguetes
        )
    );
}