<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listarCentroTrabajo(){
     $listado = pg_query("SELECT id_tbl_centro_trabajo, clave_centro_trabajo, nombre,
                                 pais, id_cat_entidad, colonia, codigo_postal, num_exterior,
                                 num_interior, latitud, longitud, id_cat_region, id_estatus_centro  
                         FROM tbl_centro_trabajo 
                         ORDER BY id_tbl_centro_trabajo DESC
                         LIMIT 10");
     return $listado;
}

function listarCentroTrabajoByIdLike($like){
     $listado = pg_query("SELECT id_tbl_centro_trabajo, clave_centro_trabajo, nombre,
                                 pais, id_cat_entidad, colonia, codigo_postal, num_exterior,
                                 num_interior, latitud, longitud, id_cat_region, id_estatus_centro  
                         FROM tbl_centro_trabajo 
                         WHERE clave_centro_trabajo LIKE '%$like%' 
                              OR nombre LIKE '%$like%'
                              OR colonia LIKE '%$like%'
                         ORDER BY id_tbl_centro_trabajo DESC
                         LIMIT 10");
     return $listado;
}


//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function catcentroTrabajo($idTblCentroTrabajo)
{
     $listado = pg_query("SELECT *
                         FROM tbl_centro_trabajo 
                         WHERE id_tbl_centro_trabajo = '$idTblCentroTrabajo'");
     $row = pg_fetch_array($listado);
     return $row;
}

function listarIdCentro($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id'");
     $row = pg_fetch_array($catSQL);
     $res = $row["clave_centro_trabajo"];
     return $res;
}

function catcentroTrabajoPk($id)
{
     if ($id != null) {
          $catSQL = pg_query("SELECT clave_centro_trabajo FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id' LIMIT 1");
          $row = pg_fetch_array($catSQL);
          $res = $row["clave_centro_trabajo"];
          return $res;
     } else {
          return "";
     }
}

function claveCentro($id_tbl_control_plazas)
{
     $catSQL = pg_query("SELECT clave_centro_trabajo FROM tbl_centro_trabajo
          INNER JOIN tbl_control_plazas 
          ON tbl_centro_trabajo.id_tbl_centro_trabajo = tbl_control_plazas.id_tbl_centro_trabajo
          WHERE tbl_control_plazas.id_tbl_control_plazas = '$id_tbl_control_plazas'");
     $row = pg_fetch_array($catSQL);
     $res = $row["clave_centro_trabajo"];
     return $res;
}
