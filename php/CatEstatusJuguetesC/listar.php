<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

     //La variable contiene el listado del catalogo de estatus
   // $listadoCE = pg_query($connectionDBsPro, "SELECT * FROM cat_estatus ORDER BY estatus ASC"); 
  
function listadoEstatusJuguetesAll(){
    $listado = pg_query("SELECT id_cat_estatus_juguetes, estatus 
                         FROM cat_estatus_juguetes
                         ORDER BY estatus ASC");
    return $listado;
}

//La funcion retorna solo el estatus
function listadoEstatusJuguetesPk($id_cat_estatus_juguetes){
    if ($id_cat_estatus_juguetes!= null){
    $catSQL = pg_query("SELECT id_cat_estatus_juguetes, estatus
                        FROM cat_estatus_juguetes 
                        WHERE id_cat_estatus_juguetes = $id_cat_estatus_juguetes ");
    $row = pg_fetch_array($catSQL);
    $res = $row["estatus"];
    return $res;
    } else {
        return "";
    }
}
