<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoFechaJuguetes(){
    $listado = pg_query("SELECT id_cat_fecha_juguetes,fecha
                         FROM cat_fecha_juguetes 
                         ORDER BY id_cat_fecha_juguetes ASC"); 
    return $listado;
}
  
function listadoFechaJuguetesByAnio($id_cat_fecha_juguetes){
    $listado = pg_query("SELECT anio
                        FROM cat_fecha_juguetes 
                        WHERE id_cat_fecha_juguetes = $id_cat_fecha_juguetes");
    $row = pg_fetch_array($listado);
    $res = $row['anio'];
    return $res;
}

function listadoFechaJuguetesByFecha($id_cat_fecha_juguetes){
    $listado = pg_query("SELECT fecha
                        FROM cat_fecha_juguetes 
                        WHERE id_cat_fecha_juguetes = $id_cat_fecha_juguetes");
    $row = pg_fetch_array($listado);
    $res = $row['fecha'];
    return $res;
}
