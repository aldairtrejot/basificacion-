<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoTurnoNewAll()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_turno ORDER BY clave_turno ASC");
    return $listado;
}

function listadoCatTurnoNewPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT * FROM cat_turno WHERE id_cat_turno = '$id' ");
        $row = pg_fetch_array($catSQL);
        $res = $row['clave_turno'].' - '.$row['turno_desc'];
        return $res;
    } else {
        return "";
    }
}

