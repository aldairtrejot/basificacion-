<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listar()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_niveles ORDER BY codigo ASC");
    return $listado;
}

function listado12()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_niveles ORDER BY codigo ASC");
    return $listado;
}

function catalogoNivelesPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT codigo FROM cat_niveles WHERE id_cat_niveles = '$id' LIMIT 1");
        $row = pg_fetch_array($catSQL);
        $res = $row["codigo"];
        return $res;
    } else {
        return "";
    }
}

