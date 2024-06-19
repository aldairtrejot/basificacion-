<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoMediosContactoId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_medios_contacto WHERE id_tbl_empleados = '$id' ORDER BY id_cat_estatus ASC");
     return $listado;
}

function listadoMediosContactoPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_medios_contacto WHERE id_ctrl_medios_contacto = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}


function estatusMediosCon($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_medios_contacto WHERE id_tbl_empleados = '$id' AND id_cat_estatus = 1");
     while ($value = pg_fetch_array($catSQL)) {
          $row[] = $value["id_cat_estatus"];
          $row[] = $value["id_ctrl_medios_contacto"];
     }
     $json = json_encode($row);
     return $json;
}
