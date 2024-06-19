<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoCP(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_plazas ORDER BY codigo_plaza ASC"); 
    return $listado;
}
  
function catalogoPlazaPk($id){
    if ($id != null){   
    $catSQL = pg_query("SELECT codigo_plaza FROM cat_plazas WHERE id_cat_plazas = '$id' LIMIT 1");
    $row = pg_fetch_array($catSQL);
    $res = $row["codigo_plaza"];
    return $res;
    }
    else {
        return "";
    }
}

