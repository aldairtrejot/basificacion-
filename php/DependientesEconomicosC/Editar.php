<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_dependientes_economicos = $_POST['id_tbl_dependientes_economicos']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$apellido_paterno = $_POST['apellido_paterno']; 
$apellido_materno = $_POST['apellido_materno']; 
$id_cat_dependientes_economicos = $_POST['id_cat_dependientes_economicos']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos
);

$arrayUpdate = array(
    'curp' => $curp,
    'nombre' => $nombre,
    'apellido_paterno' => $apellido_paterno,
    'apellido_materno' => $apellido_materno,
    'id_cat_dependientes_economicos' => $id_cat_dependientes_economicos
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_dependientes_economicos', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/DependientesEconomicos/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}