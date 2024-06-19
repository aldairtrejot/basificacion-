<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoMovimientoAll(){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM tbl_movimientos ORDER BY codigo ASC"); 
    return $listado;
}

function catMovimientoPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM tbl_movimientos WHERE id_tbl_movimientos = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row["codigo"].' - '.$row['nombre_movimiento'];
    return $res;
    } else {
        return "";
    }
}

function catMovimientoPkByName($id){
    if ($id != null){
    $catSQL = pg_query("SELECT nombre_movimiento,id_tbl_movimientos 
                        FROM tbl_movimientos 
                        WHERE id_tbl_movimientos = $id");
    $row = pg_fetch_array($catSQL);
    $res = $row['nombre_movimiento'];
    return $res;
    } else {
        return "";
    }
}
