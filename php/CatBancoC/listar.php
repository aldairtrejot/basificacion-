<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoBanco()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_banco ORDER BY identificador ASC");
    return $listado;
}

//La funcion retorna solo el estatus
function listadoBancoPk($id)
{
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_banco WHERE id_cat_banco = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row['identificador'] . ' - ' . $row['nombre'];
    return $res;
    } else {
        return '';
    }
}
