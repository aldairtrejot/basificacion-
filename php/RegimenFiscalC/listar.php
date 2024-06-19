<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado del catalogo de regimen fiscal
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_regimen_fiscal ORDER BY regimen_fiscal ASC"); 
  
//La funcion retorna el nombre del regimen cuando se introduce su id
function catRegimenFiscal($id){
    $catSQL = pg_query("SELECT * FROM cat_regimen_fiscal WHERE id_cat_regimen_fiscal = '$id' ");
    $row = pg_fetch_array($catSQL);
    $regimenFiscal = $row["regimen_fiscal"];
    return $regimenFiscal;
}