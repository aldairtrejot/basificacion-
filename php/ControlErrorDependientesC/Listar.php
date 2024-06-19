<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

function insertarErrorDependieteEco(
    $rfc_empleado,
    $curp_empleado,
    $curp_menor,
    $nombre,
    $apellido_paterno,
    $apellido_materno,
    $estatus,
    $descripcion,
    $linea_exel,
    $id_carga_masiva
) {
    include ('../../conexion.php');
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'ctrl_error_dependientes_economicos',
        array(
            'rfc_empleado' => utf8_encode($rfc_empleado),
            'curp_empleado' => utf8_encode($curp_empleado),
            'curp_menor' => utf8_encode($curp_menor),
            'apellido_paterno' => utf8_encode($apellido_paterno),
            'apellido_materno' => utf8_encode($apellido_materno),
            'estatus' => utf8_encode($estatus),
            'nombre' => utf8_encode($nombre),
            'descripcion' => utf8_encode($descripcion),
            'linea_exel' => utf8_encode($linea_exel),
            'id_carga_masiva' => utf8_encode($id_carga_masiva),
        )
    );
}