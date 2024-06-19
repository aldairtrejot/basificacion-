<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoRetardoId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_retardo WHERE id_tbl_empleados = '$id' ORDER BY id_tbl_empleados ASC");
     return $listado;
}

function listadoRetardoPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_retardo WHERE id_ctrl_retardo = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

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
