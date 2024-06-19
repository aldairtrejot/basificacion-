<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$apellido_paterno = $_POST['apellido_paterno']; 
$apellido_materno = $_POST['apellido_materno']; 
$id_cat_dependientes_economicos = $_POST['id_cat_dependientes_economicos']; 
$crypt = base64_encode ($id_tbl_empleados);


try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_dependientes_economicos', array(
    'curp' => $curp,
    'nombre' => $nombre,  
    'apellido_paterno' => $apellido_paterno,  
    'apellido_materno' => $apellido_materno,  
    'id_cat_dependientes_economicos' => $id_cat_dependientes_economicos,  
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/DependientesEconomicos/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}