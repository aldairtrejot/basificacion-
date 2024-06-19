<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoCedulaByAll($id)
{
     $listado = pg_query("SELECT * 
                          FROM crtl_cedula_empleados
                          WHERE id_tbl_empleados = '$id' 
                          ORDER BY id_ctrl_cedula_empleados DESC");
     return $listado;
}

function listadoCeludaByPk($id)
{
     $listado = pg_query("SELECT * 
                         FROM crtl_cedula_empleados 
                         WHERE id_ctrl_cedula_empleados = '$id' ");
     $row = pg_fetch_array($listado);
     return $row;
}

/*
function horaAdd($hora, $minuto){
     $concat = addCero($hora).':'.addCero($minuto);
     if ($hora == null && $minuto == null){
          $concat = "";
     }
     return $concat;
}

function addCero($time){
     if ($time <= 9){
          $time = '0'. $time;
     } 
     return $time;
}
*/