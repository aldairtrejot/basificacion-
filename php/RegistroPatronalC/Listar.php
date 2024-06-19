<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado
    $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_registro_patronal ORDER BY registro_patronal DESC"); 
  

    function listadoFk($id){
     $catSQL = pg_query("SELECT * FROM tbl_registro_patronal WHERE id_tbl_centro_trabajo = '$id' ");
     return $catSQL;
}
     //La funcion retorna los atributos dependiendo del id que se ingrese como parametro
     function listadoPk($id){
          $catSQL = pg_query("SELECT * FROM tbl_registro_patronal WHERE id_tbl_registro_patronal = '$id' ");
          $row = pg_fetch_array($catSQL);
          return $row;
     }
