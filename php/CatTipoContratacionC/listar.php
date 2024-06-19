<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion


function listadoContratacion(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_tipo_contratacion ORDER BY descripcion_cont ASC"); 
    return $listado;
}
  
function catalogoContratacionPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT descripcion_cont FROM cat_tipo_contratacion WHERE id_cat_tipo_contratacion = '$id'");
    $row = pg_fetch_array($catSQL);
    $res = $row["descripcion_cont"];
    return $res;
    } else {
        return "";
    }
}

