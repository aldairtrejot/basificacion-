<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoHorarioAll($id)
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT * FROM cat_horario WHERE id_cat_turno = '$id'");
    return $listado;
}

function listadoHorarioPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT * FROM cat_horario WHERE id_cat_horario = '$id' ");
        $row = pg_fetch_array($catSQL);
        $res = concat(
            $row['pri_hora_entrada'],
            $row['pri_minuto_entrada'],
            $row['pri_hora_salida'],
            $row['pri_minuto_salida'],
            $row['pri_descripcion'],
            $row['seg_hora_entrada'],
            $row['seg_minuto_entrada'],
            $row['seg_hora_salida'],
            $row['seg_minuto_salida'],
            $row['seg_descripcion'],
            $row['id_cat_estatus_union']
        );
        return $res;
    } else {
        return "";
    }
}

/**
 * $phe: Primer hora de entrada
 * $phs: Primer hora de salida
 * $pme: Primer minuto de entrada
 * $pms: Primer minuto de salida
 * $pd: Primera Descripcion
 * $dhe: Segunda hora entrada
 * $dme: Segundo minuto de entrada
 * $dhs: Segunda hora de salida
 * $dms: Segundo minuto de salida
 * $dd: segunda descripcion
 * $id: Id de tabla cat_estatus_union
 */
function concat($phe, $pme, $phs, $pms, $pd, $dhe, $dme, $dhs, $dms, $dd, $id)
{
    $concat = "";
    $pme = addC($pme );
    $pms = addC($pms);
    $dme = addC($dme);
    $dms = addC($dms);

    if ($id == 1) {
        if ($phs != null) {
            $concat = $phe . ':' . $pme . ' a ' . $phs . ':' . $pms . '  ' . $pd;
        } else {
            $concat = $phe . ':' . $pme . ' ' . $pd;
        }
    } else if ($id == 2) {
        $concat = $phe . ':' . $pme . ' a ' . $phs . ':' . $pms . '  ' . $pd . ' y ' . $dhe . ':' . $dme . ' a ' . $dhs . ':' . $dms . ' ' . $dd;
    }
    return $concat;
}

//Funcion para incremento de 0
function addC($num)
{
    if ($num == '0') {
        $num = '00';
    }
    return $num;
}