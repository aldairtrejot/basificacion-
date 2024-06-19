<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_control_plazas = base64_decode($_POST['id_tbl_control_plazas']);
$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$rfc = $_POST['rfc']; 
$nss = $_POST['nss']; 
$crypt = base64_encode($id_tbl_control_plazas);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_empleados', array(
    'id_tbl_control_plazas' => $id_tbl_control_plazas,
    'curp' => $curp,   
    'nombre' => $nombre,  
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apellido,  
    'rfc' => $rfc,  
    'nss' => $nss
));

if ($pgs_QRY ) {
    header("Location: ../../view/Empleados/Listar.php?D-F3=".$crypt.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}
