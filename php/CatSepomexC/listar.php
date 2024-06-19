<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listarCatSepmexEstado()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT DISTINCT d_estado,c_estado FROM cat_sepomex ORDER BY d_estado ASC");
    return $listado;
}

function listarCatSepmexMunicipio($id)
{
    $listado = pg_query("SELECT DISTINCT d_mnpio, c_mnpio, c_estado FROM cat_sepomex WHERE c_estado = $id ORDER BY d_mnpio ASC");
    return $listado;
}

function listarCatSepmexColonia($id, $id_estado){
    $listado = pg_query("SELECT DISTINCT id_cat_sepomex, colonia_origen,c_mnpio, c_estado 
                        FROM cat_sepomex
                        WHERE c_estado = $id_estado
                        AND c_mnpio = $id
                        ORDER BY colonia_origen ASC");
    return $listado;
}


function lisSepmexById($id)
{
    if ($id){
    $catSQL = pg_query("SELECT id_cat_sepomex,d_asenta,d_mnpio,d_estado 
                        FROM cat_sepomex
                        WHERE id_cat_sepomex = $id
                        LIMIT 1");
    $row = pg_fetch_array($catSQL);
    return $row;
    } else {
        $row = "";
    }
}
