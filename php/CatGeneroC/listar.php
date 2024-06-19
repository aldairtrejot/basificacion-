<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoGenero(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_genero ORDER BY genero ASC"); 
    return $listado;
}
  
//La funcion retorna solo el estatus
function catGeneroPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_genero WHERE id_cat_genero = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row['genero'];
    return $res;
    } else {
        return "";
    }
}
