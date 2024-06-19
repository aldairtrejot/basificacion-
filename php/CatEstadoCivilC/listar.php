<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoCivil()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_estado_civil ORDER BY estado_civil ASC");
    return $listado;
}

function catalogoCivilPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT * FROM cat_estado_civil WHERE id_cat_estado_civil = '$id' ");
        $row = pg_fetch_array($catSQL);
        $res = $row['estado_civil'];
        return $res;
    } else {
        return "";
    }
}

