<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoCamposPerByIdEmpleado($id_tbl_empleados)
{
     $listado = pg_query("SELECT *
                          FROM ctrl_campos_pers
                          WHERE id_tbl_empleados = $id_tbl_empleados;");
     $row = pg_fetch_array($listado);
     return $row;
}

function listadoIsNullByCamposPer()
{
     $array = [
          "id_ctrl_campos_pers" => null,
          "porcentaje_ahorro_s" => null,
          "dias_medio_sueldo" => null,
          "dias_sin_sueldo" => null,
          "reintegro_faltas_retardos" => null,
          "porcentaje_svi" => null,
          "importe_festivo" => null,
          "importe_horas_ex" => null,
          "importe_prima_dominical" => null,
          "importe_descuentos_indebidos" => null,
          "importe_recuperacion_pagos_indebidos" => null,
          "dias_sansion_adma" => null,
          "regimen_pen" => null,
          "quinquenio" => null,
          "num_hijos" => null,
          "num_dias_jornada_dominical" => null,
          "num_dias_guardia_festiva" => null,
          "aplicar_juguetes" => null,
          "apoyo_titulacion" => null,
          "licencia_manejo" => null
     ];
     return $array;
}

/*
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

*/