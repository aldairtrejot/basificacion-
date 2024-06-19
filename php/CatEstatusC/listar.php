<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado del catalogo de estatus
    $listadoCE = pg_query($connectionDBsPro, "SELECT * FROM cat_estatus ORDER BY estatus ASC"); 
  
//La funcion retorna solo el estatus
function catEstatus($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_estatus WHERE id_cat_estatus = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["estatus"];
    return $res;
    } else {
        return "";
    }
}

function listadoEstatusByAll(){
    $listado = pg_query("SELECT * FROM cat_estatus ORDER BY estatus ASC"); 
    return $listado;
}
