<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoDomicilioByIdDatosEmpleado($id_tbl_datos_empleado)
{
     $listado = pg_query("SELECT entidad1,municipio1,colonia1,codigo_postal1,calle1,num_exterior1,
                                 num_interior1,id_estatus1,entidad2,municipio2,colonia2,codigo_postal2,
                                 calle2,num_exterior2,num_interior2,id_estatus2,esdireccion_fiscal1,
                                 esdireccion_fiscal2,id_tbl_domicilios,id_tbl_datos_empleado
                          FROM tbl_domicilios
                          WHERE id_tbl_datos_empleado = $id_tbl_datos_empleado;");
     $row = pg_fetch_array($listado);
     return $row;
}

function listadoIsNull()
{
     $array = [
          "entidad1" => null,
          "municipio1" => null,
          "colonia1" => null,
          "codigo_postal1" => null,
          "calle1" => null,
          "num_exterior1" => null,
          "num_interior1" => null,
          "id_estatus1" => null,
          "esdireccion_fiscal1" => null,
          "entidad2" => null,
          "municipio2" => null,
          "colonia2" => null,
          "codigo_postal2" => null,
          "calle2" => null,
          "num_exterior2" => null,
          "num_interior2" => null,
          "id_estatus2" => null,
          "esdireccion_fiscal2" => null,
          "id_tbl_domicilios" => null,
          "id_tbl_datos_empleado" => null
     ];
     return $array;
}

/*
function listadoJefeInmediaroPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_jefe_inmediato WHERE id_ctrl_jefe_inmediato = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function estatusJefeIn($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_jefe_inmediato WHERE id_tbl_empleados = '$id' AND id_cat_estatus = 1");
     while ($value = pg_fetch_array($catSQL)) {
          $row[] = $value["id_cat_estatus"];
          $row[] = $value["id_ctrl_jefe_inmediato"];
     }
     $json = json_encode($row);
     return $json;
}
*/