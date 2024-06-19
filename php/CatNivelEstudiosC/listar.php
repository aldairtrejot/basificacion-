<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoNivelEstudios()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_nivel_estudios ORDER BY nivel_estudios ASC");
    return $listado;
}

function catalogoNivelEstudiosPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT * FROM cat_nivel_estudios WHERE id_cat_nivel_estudios = '$id' ");
        $row = pg_fetch_array($catSQL);
        $res = $row['nivel_estudios'];
        return $res;
    } else {
        return "";
    }
}

