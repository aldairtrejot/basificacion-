<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$clave_centro_trabajo = $_POST['clave_centro_trabajo']; //Se obtiene el valor de clave_centro_trabajo
$nombre = $_POST['nombre']; //Se obtiene el valor de nombre
$pais = $_POST['pais']; //Se obtiene el valor de pais
$entidad = $_POST['entidad']; //Se obtiene el valor de pais
$colonia = $_POST['colonia']; //Se obtiene el valor de codigo_postal
$codigo_postal = $_POST['codigo_postal']; //Se obtiene el valor de num_exterior
$num_exterior = $_POST['num_exterior']; //Se obtiene el valor de num_interior
$num_interior = $_POST['num_interior']; //Se obtiene el valor de latitud
$longitud = $_POST['longitud']; //Se obtiene el valor de longitud
$latitud = $_POST['latitud']; //Se obtiene el valor de id_cat_sepomex
$id_cat_region = $_POST['id_cat_region']; //Se obtiene el valor de id_cat_region
$id_estatus_centro = $_POST['id_estatus_centro']; //Se obtiene el valor de id_estatus_centro

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_centro_trabajo', array(
    'clave_centro_trabajo' => $clave_centro_trabajo,
    'nombre' => $nombre,   
    'pais' => $pais,
    'id_cat_entidad' => $entidad,
    'colonia' => $colonia,
    'codigo_postal' => $codigo_postal,
    'num_exterior' => $num_exterior,
    'num_interior' => $num_interior,
    'longitud' => $longitud,
    'latitud' => $latitud,
    'id_cat_region' => $id_cat_region,
    'id_estatus_centro' => $id_estatus_centro
));

if ($pgs_QRY ) {
    header("Location: ../../view/CentroTrabajo/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}