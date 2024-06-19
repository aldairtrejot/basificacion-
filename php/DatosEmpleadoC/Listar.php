<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoDatosEmpleadosId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM tbl_datos_empleado WHERE id_tbl_empleados = '$id' ");
     return $listado;
}

function listadoDatosEmpleadosPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_datos_empleado WHERE id_tbl_datos_empleado = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
