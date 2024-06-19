<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion


function listadoPuesto(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_puesto ORDER BY codigo_puesto ASC"); 
    return $listado;
}
  
function catalogoPuestoPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT codigo_puesto FROM cat_puesto WHERE id_cat_puesto = '$id' LIMIT 1");
    $row = pg_fetch_array($catSQL);
    $res = $row["codigo_puesto"];
    return $res;
    }else{
        return "";
    }
}

