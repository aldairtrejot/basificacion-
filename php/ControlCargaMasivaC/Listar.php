<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

function agregarControlCargaMasivaNew($id_cat_carga_masiva, $id_usuario)
{
    include ('../../conexion.php');
    $now = 'NOW()';
    $insert = pg_insert($connectionDBsPro, 'ctrl_carga_masiva', array(
        'id_usuario' => $id_usuario,
        'id_cat_carga_masiva' => $id_cat_carga_masiva,
        'fecha' => $now,
    )
    );
}

function listarControlCargaMasivaByMax()
{
    $list = pg_query("SELECT MAX(id_ctrl_carga_masiva) 
                         FROM ctrl_carga_masiva");
    $row = pg_fetch_array($list);
    $res = $row[0];
    return $res;
}

function listarCargaMasivaByAll()
{
    $listado = pg_query("SELECT id_ctrl_carga_masiva, id_cat_carga_masiva, id_usuario, fecha
                         FROM ctrl_carga_masiva
                         ORDER BY id_ctrl_carga_masiva DESC
                         LIMIT 25");
    return $listado;
}