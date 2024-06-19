<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_ctrl_contacto_emergencia = $_POST['id_ctrl_contacto_emergencia']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$parentesco = $_POST['parentesco']; 
$movil = $_POST['movil']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_contacto_emergencia' => $id_ctrl_contacto_emergencia
);

$arrayUpdate = array(
    'nombre' => $nombre,
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apellido,  
    'parentesco' => $parentesco,
    'movil' => $movil,
    'id_cat_estatus' => $id_cat_estatus
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_contacto_emergencia', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/ContactoEmergencia/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}