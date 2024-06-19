<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion


function listadoZona(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_zona_tabuladores ORDER BY zona_tabuladores ASC"); 
    return $listado;
}
  
function catalogoZonaPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT zona_tabuladores, id_cat_zonas_tabuladores FROM cat_zona_tabuladores WHERE id_cat_zonas_tabuladores = '$id' LIMIT 1");
    $row = pg_fetch_array($catSQL);
    $res = $row["zona_tabuladores"];
    return $res;
    }else{
        return "";
    }
}

