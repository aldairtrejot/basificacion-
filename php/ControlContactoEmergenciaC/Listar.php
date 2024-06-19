<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoContactoEmergenciaId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_contacto_emergencia WHERE id_tbl_empleados = '$id'");
     return $listado;
}

function listadoContactoEmergenciaPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_contacto_emergencia WHERE id_ctrl_contacto_emergencia = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
