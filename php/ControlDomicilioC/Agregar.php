<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_jefe_inmediato', array(
    'nombre' => $nombre,
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apellido,
    'id_cat_estatus' => $id_cat_estatus,
    'id_tbl_empleados' => $id_tbl_empleados,
));

if ($pgs_QRY ) {
    header("Location: ../../view/JefeInmediato/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}