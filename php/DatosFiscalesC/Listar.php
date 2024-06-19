<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado de datos fiscales
    $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_datos_fiscales ORDER BY id_tbl_datos_fiscales DESC"); 
  
     //La funcion retorna los atributos dependiendo del id que se ingrese como parametro
     function catDatosFiscales($id){
          $catSQL = pg_query("SELECT * FROM tbl_datos_fiscales WHERE id_tbl_datos_fiscales = '$id' ");
          $row = pg_fetch_array($catSQL);
          return $row;
     }
