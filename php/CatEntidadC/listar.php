<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

function listadoCatEntidadPk($idCatEntidad)
{
    include ('../../conexion.php');
    $res = '';
    if ($idCatEntidad != null){
    $listado = pg_query($connectionDBsPro, "SELECT id_cat_entidad, entidad
                                            FROM cat_entidad 
                                            WHERE id_cat_entidad = $idCatEntidad
                                            ORDER BY entidad ASC");
    $row = pg_fetch_array($listado);
    $res = $row['entidad'];
    } 
    return $res;
}

function listadoCatEntidadByName()
{
    $listado = pg_query("SELECT id_cat_entidad, entidad
                         FROM cat_entidad 
                         ORDER BY entidad ASC");
    return $listado;
}
