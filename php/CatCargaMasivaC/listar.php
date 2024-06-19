<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

function listadoCargaMasivaByAll()
{
    $listado = pg_query("SELECT id_cat_carga_masiva,nombre 
                         FROM cat_carga_masiva");
    return $listado;
}

function listadoCargaMasivaByNombre($id_cat_carga_masiva)
{
    $res = '';
    if ($id_cat_carga_masiva != null) {
        $listado = pg_query("SELECT id_cat_carga_masiva,nombre 
                             FROM cat_carga_masiva 
                             WHERE id_cat_carga_masiva = $id_cat_carga_masiva");
        $row = pg_fetch_array($listado);
        $res = $row['nombre'];
    }
    return $res;
}