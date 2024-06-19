<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoDependientesEconomicosId($id)
{
     include ('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_empleados = '$id' ORDER BY  tbl_dependientes_economicos DESC");
     return $listado;
}

function listadoDependientesEconomicosPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_dependientes_economicos = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function listarParaJuguetesNombre($id_tbl_dependientes_economicos)
{
     if ($id_tbl_dependientes_economicos != null) {
          $catSQL = pg_query("SELECT id_tbl_dependientes_economicos, nombre, apellido_paterno,
                                     apellido_materno
                              FROM tbl_dependientes_economicos
                              WHERE id_tbl_dependientes_economicos = $id_tbl_dependientes_economicos ");
          $row = pg_fetch_array($catSQL);
          $res = $row['nombre'] . '  ' . $row['apellido_paterno'] . ' ' . $row['apellido_materno'];
          return $res;
     } else {
          return "";
     }
}


function listarParaJuguetesCurp($id_tbl_dependientes_economicos)
{
     if ($id_tbl_dependientes_economicos != null) {
          $catSQL = pg_query("SELECT id_tbl_dependientes_economicos, curp
                              FROM tbl_dependientes_economicos
                              WHERE id_tbl_dependientes_economicos = $id_tbl_dependientes_economicos ");
          $row = pg_fetch_array($catSQL);
          $res = $row['curp'];
          return $res;
     } else {
          return "";
     }
}

function validaExistaCurpByCurp($curp)
{
     $listado = pg_query("SELECT COUNT (id_tbl_dependientes_economicos)
          FROM tbl_dependientes_economicos
          WHERE curp = TRIM ('$curp');");
     $row = pg_fetch_array($listado);
     $res = $row[0];
     return $res;
}

function insertarDependienteEconomico($curp, $nombre, $apellido_paterno, $apellido_materno, $id_cat_dependientes_economicos, $id_tbl_empleados)
{
     include ('../../conexion.php');
     $pgs_QRY = pg_insert(
          $connectionDBsPro,
          'tbl_dependientes_economicos',
          array(
               'curp' => utf8_encode($curp),
               'nombre' => utf8_encode($nombre),
               'apellido_paterno' => utf8_encode($apellido_paterno),
               'apellido_materno' => utf8_encode($apellido_materno),
               'id_cat_dependientes_economicos' => $id_cat_dependientes_economicos,
               'id_tbl_empleados' => $id_tbl_empleados
          )
     );
}

function modificarDependienteEconomicoByMas($id_tbl_dependientes_economicos, $nombre, $apellido_paterno, $apellido_materno, $id_cat_dependientes_economicos, $id_tbl_empleados)
{
     include ('../../conexion.php');
     $pgs_QRY = pg_update($connectionDBsPro, 'tbl_dependientes_economicos', array(
          'nombre' => utf8_encode($nombre),
          'apellido_materno' => utf8_encode($apellido_materno),
          'apellido_paterno' => utf8_encode($apellido_paterno),
          'id_tbl_empleados' => utf8_encode($id_tbl_empleados),
     ), array(
          //Array condition
          'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos
     )
     );
}

function idDependieEconomico($curp)
{
     $listado = pg_query("SELECT id_tbl_dependientes_economicos
                         FROM tbl_dependientes_economicos
                         WHERE curp = TRIM('$curp');");
     $row = pg_fetch_array($listado);
     $res = $row[0];
     return $res;
}