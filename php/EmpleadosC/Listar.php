<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoEmpleados($id)
{
     include ('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT tbl_empleados.id_tbl_empleados, 
                                 tbl_empleados.rfc, tbl_empleados.curp, tbl_empleados.nombre,
                                 tbl_empleados.primer_apellido, tbl_empleados.segundo_apellido, 
                                 tbl_empleados.nss, 
                                 tbl_plazas_empleados.id_tbl_empleados,
                                 tbl_plazas_empleados.id_tbl_control_plazas   
                         FROM tbl_empleados 
                         INNER JOIN tbl_plazas_empleados    
                         ON tbl_empleados.id_tbl_empleados = tbl_plazas_empleados.id_tbl_empleados
                         WHERE tbl_plazas_empleados.id_tbl_control_plazas = $id");
     return $listado;
}

function listadoLikeEmp($like)
{
     $listado = pg_query("SELECT curp,rfc,nombre,primer_apellido,segundo_apellido,id_tbl_empleados
                          FROM tbl_empleados 
                          WHERE (curp LIKE '%$like%' 
                          OR rfc LIKE '%$like%')");
     return $listado;
}

//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function catEmpleadosId($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_empleados WHERE id_tbl_empleados = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function nombreEmpleado($id_tbl_control_plaza)
{
     $res = '';
     $listado = pg_query("SELECT nombre, primer_apellido, segundo_apellido 
                               FROM tbl_empleados AS emp 
                               INNER JOIN tbl_plazas_empleados AS pe   
                               ON emp.id_tbl_empleados = pe.id_tbl_empleados
                               WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
     $row = pg_fetch_array($listado);
     if (!empty($row[0])) {
          $res = $row['nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'];
     }
     return $res;
}

function rfcEmpleado($id_tbl_control_plaza)
{
     $res = '';
     $listado = pg_query("SELECT rfc
                               FROM tbl_empleados AS emp 
                               INNER JOIN tbl_plazas_empleados AS pe   
                               ON emp.id_tbl_empleados = pe.id_tbl_empleados
                               WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
     $row = pg_fetch_array($listado);
     if (!empty($row[0])) {
          $res = $row['rfc'];
     }
     return $res;
}

function codigoEmpleado($id_tbl_control_plaza)
{
     $res = '';
     $listado = pg_query("SELECT curp 
                          FROM tbl_empleados AS emp 
                          INNER JOIN tbl_plazas_empleados AS pe   
                          ON emp.id_tbl_empleados = pe.id_tbl_empleados
                          WHERE pe.id_tbl_control_plazas = $id_tbl_control_plaza");
     $row = pg_fetch_array($listado);
     if (!empty($row[0])) {
          $res = $row['curp'];
     }
     return $res;
}

function validacionEmpleado($curp, $rfc)
{
    $listado = pg_query("SELECT tbl_empleados.id_tbl_empleados, tbl_empleados.curp,
                                tbl_empleados.rfc, cat_tipo_contratacion.id_cat_tipo_contratacion
                        FROM tbl_empleados
                        INNER JOIN tbl_plazas_empleados
                        ON tbl_empleados.id_tbl_empleados = tbl_plazas_empleados.id_tbl_empleados
                        INNER JOIN tbl_control_plazas
                        ON tbl_plazas_empleados.id_tbl_control_plazas = tbl_control_plazas.id_tbl_control_plazas
                        INNER JOIN cat_tipo_contratacion
                        ON tbl_control_plazas.id_cat_tipo_contratacion = cat_tipo_contratacion.id_cat_tipo_contratacion
                        WHERE cat_tipo_contratacion.id_cat_tipo_contratacion = 3 
                        AND (tbl_empleados.curp = TRIM('$curp') 
                        OR tbl_empleados.rfc = TRIM('$rfc'))");
    $row = pg_fetch_array($listado);
    $res = $row[0];
    return $res;
}
