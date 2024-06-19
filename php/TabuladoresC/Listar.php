<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoTabuladore()
{
     $listado = pg_query("SELECT * FROM tbl_tabuladores ORDER BY id_tbl_tabuladores DESC LIMIT 100");
     return $listado;
}
//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function listadoPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_tabuladores WHERE id_tbl_tabuladores = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
