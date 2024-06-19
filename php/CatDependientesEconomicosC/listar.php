<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoDEconomicos(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_dependientes_economicos ORDER BY clave ASC"); 
    return $listado;
}
  
//La funcion retorna solo el estatus
function listadoDEconomicosPK($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_dependientes_economicos WHERE id_cat_dependientes_economicos = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row['clave'] . ' - ' . $row['nombre'];
    return $res;
    } else {
        return "";
    }
}
