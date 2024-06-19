<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas


$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_dependientes_economicos = $_POST['id_tbl_dependientes_economicos']; 
$id_cat_fecha_juguetes = $_POST['id_cat_fecha_juguetes']; 
$id_cat_estatus_juguetes = $_POST['id_cat_estatus_juguetes']; ;
$crypt = base64_encode ($id_tbl_empleados);
//Regreso a la tabla

try {
    insertarCtrlJuguetesData($connectionDBsPro, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes, $id_tbl_empleados, $id_tbl_dependientes_economicos);
    header("Location: ../../view/Juguetes/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}


///LA FUNCION INSERTA INFO EN LA TABLA ctrl_juguetes
function insertarCtrlJuguetesData($connectionDBsPro, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes, $id_tbl_empleados, $id_tbl_dependientes_economicos)
{
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'ctrl_juguetes',
        array(
            'id_cat_fecha_juguetes' => $id_cat_fecha_juguetes,
            'id_cat_estatus_juguetes' => $id_cat_estatus_juguetes,
            'id_tbl_empleados' => $id_tbl_empleados,
            'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos
        )
    );
}