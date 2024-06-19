<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion


function listadoRubrosTab(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_rubros_tabuladores ORDER BY codigo ASC"); 
    return $listado;
}
  
function catalogoRubrosTabPk($id){
    $catSQL = pg_query("SELECT * FROM cat_rubros_tabuladores WHERE id_cat_rubros_tabuladores = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["codigo"];
    return $res;
}

