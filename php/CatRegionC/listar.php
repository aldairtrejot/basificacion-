<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado del catalogo de region
    $listadoCR = pg_query($connectionDBsPro, "SELECT * FROM cat_region ORDER BY id_cat_region ASC"); 
  
//La funcion retorna solo la clave de la region
function catRegionClave($id){
    $catSQL = pg_query("SELECT * FROM cat_region WHERE id_cat_region = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["clave_region"];
    return res;
}

//La funcion retorna la concatenacion de clave-region con region eje. 01 - Region Centro
function catRegionRegion($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_region WHERE id_cat_region = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["clave_region"]." - ".$row['region'];
    return $res;
    } else {
        return "";
    }
}