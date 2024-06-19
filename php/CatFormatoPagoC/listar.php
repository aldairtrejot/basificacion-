<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoFormatoPago()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_formato_pago ORDER BY forma_pago ASC");
    return $listado;
}

//La funcion retorna solo el estatus
function listadoFormatoPagoPk($id)
{
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_formato_pago WHERE id_cat_formato_pago = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row['forma_pago'];
    return $res;
    } else {
        return '';
    }
}
