<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoPlazasEmpleadosByIdPlaza($id_tbl_plazas_empleados)
{
     $listado = pg_query("SELECT fecha_inicio, fecha_termino, id_tbl_movimientos, fecha_movimiento,
                                 id_tbl_control_plazas,id_tbl_empleados, id_tbl_plazas_empleados,
                                 tipo_movimiento 
                              FROM tbl_plazas_empleados   
                              WHERE id_tbl_control_plazas = $id_tbl_plazas_empleados;");
     return $listado;
}
