<?php
include ('../../validar_sesion.php');
include ("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas'];
$id_ctrl_juguetes = $_POST['id_ctrl_juguetes'];
$id_tbl_dependientes_economicos = $_POST['id_tbl_dependientes_economicos'];
$id_cat_fecha_juguetes = $_POST['id_cat_fecha_juguetes'];
$id_cat_estatus_juguetes = $_POST['id_cat_estatus_juguetes'];
$crypt = base64_encode($id_tbl_empleados);

try {
    editCtrlJuegos($connectionDBsPro, $id_ctrl_juguetes, $id_tbl_dependientes_economicos, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes);
    header("Location: ../../view/Juguetes/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo); //Regreso a la tabla
} catch (\Throwable $th) {
    header("Location: error.php" . $th); //Muestra error
}


function editCtrlJuegos($connectionDBsPro, $id_ctrl_juguetes, $id_tbl_dependientes_economicos, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes)
{
    $arrayCondition = array(
        'id_ctrl_juguetes' => $id_ctrl_juguetes
    );

    $arrayUpdate = array(
        'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos,
        'id_cat_fecha_juguetes' => $id_cat_fecha_juguetes,
        'id_cat_estatus_juguetes' => $id_cat_estatus_juguetes
    );

    pg_update($connectionDBsPro, 'ctrl_juguetes', $arrayUpdate, $arrayCondition);
}