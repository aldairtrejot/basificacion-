<?php
include '../librerias.php';

//CLASS
$modelMovimientosM = new ModelMovimientosM();
$row = new Row();
$modelPlazasHraes = new modelPlazasHraes();

///MESSAGES
$bool = true;
$mensaje = 'ok';

///variables
$fecha_movimiento = $_POST['fecha_movimiento'];
$movimiento_general = $_POST['movimiento_general'];
$movimientoBaja = $_POST['movimientoBaja'];
$movimientoMov = $_POST['movimientoMov'];
$movimientoAlta = $_POST['movimientoAlta'];
$id_object = $_POST['id_object'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$num_plaza = $_POST['num_plaza_new'];
$id_cat_situacion_plaza_hraes = $_POST['situacionPlaza'];

///INFO DATABASE 
$existUltimoM = $row->returnArrayById($modelMovimientosM->countUltimoMovimiento($id_tbl_empleados_hraes));

///VALIDACIONES
if ($existUltimoM[0] != 0) {///EXISTEN REGISTRO DE MOVIMIENTOS
    $ultimoMovimiento = $row->returnArrayById($modelMovimientosM->listadoUltimoMovimiento($id_tbl_empleados_hraes));
    if ($movimiento_general == $movimientoBaja && $ultimoMovimiento[0] == $movimientoBaja) {///EL USUARIO INTENTA HACER UNA BAJA POR LO TANTO EL ULTIMO MOVIMIENTO TUVO QUE SER ALTA O MOVIMIENTO
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'Para asignar una baja, el empleado debe estar asociado a una plaza.';
    } else if ($movimiento_general == $movimientoAlta && $ultimoMovimiento[0] != $movimientoBaja) {//EL USUARIO INTENTA HACER UNA ALTA, POR LO TANTO EL ULTIMO MOVIMIENTO TUVO QUE SER UNA BAJA
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'Para que un empleado pueda recibir una alta, debe haber tenido una baja previa.';
    } else if ($movimiento_general == $movimientoMov && $ultimoMovimiento[0] == $movimientoBaja) { ///PARA ASIGNAR UN MOVIMIENTO EL ULTIMO MOVIMIENTO TUBO QUE SER UNA ALTA O MOVIMIENTO
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'Para que un empleado reciba un movimiento, es necesario que tenga una alta previa.';
    } else if ($ultimoMovimiento[1] >= $fecha_movimiento) {///COMPARA QUE LA FECHA INGRESADA SEA MAYOR A LA FECHA ANTERIOR
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'La fecha ingresada debe ser posterior a la fecha registrada del último movimiento.';
    }
} else { ///NO EXISTEN REGISTRO DEL USUARIOS
    if ($movimiento_general != $movimientoAlta) { ///EL USUARIO INTENTA HACER BAJA O MOVIMIENTO, COMO EL USUARIO NO TIENE INFO SOLO PODRA HACER ALTAS
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'Para asignar una baja o movimiento, el empleado debe estar asociado a una plaza.';
    }
}

if ($id_cat_situacion_plaza_hraes == 0) { //VALIDA QUE EL NUMERO DE PLAZA NO EXISTA
    $result = $row->returnArrayById($modelPlazasHraes->countNumPlaza($num_plaza));
    if ($result[0] != 0) {
        $bool = false; ///CAMBIAR ESTATUS DE VALORES Y MENSAJE DE ERROR
        $mensaje = 'Existe un registro con el número de plaza ingresado';
    }
}

$row = [
    'bool' => $bool,
    'mensaje' => $mensaje,
    'id_cat_situacion_plaza_hraes' => $id_cat_situacion_plaza_hraes,
];

echo json_encode($row);
/*
$movimiento = 2; ///OBTENIDO DEL CATALOGO TBL_MOVIMIENTOS
$alta = 1; ///OBTENIDO DEL CATALOGO TBL_MOVIMIENTOS
$baja = 3; ///OBTENIDO DEL CATALOGO TBL_MOVIMIENTOS

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$id_movimiento = $_POST['id_movimiento'];
$count = $row->returnArrayById($modelMovimientosM->countUltimoMovimiento($id_tbl_empleados_hraes));
$ultimoMovimiento = 0;
$id_plaza_x = null;
$bool = false; ///Variable que controla el error


if ($id_movimiento == $alta){///CODIGO DE MOVIMIENTO DE ALTA DE USUARIOS
    $mensaje = 'Para asignar una alta es necesario un registro nuevo o baja'; /// variable de mensaje
    if ($count[0] != 0){///Existen registros en la tabla
        ///Se consulta el ultimo movimiento
        $ultimoMovimiento = $row->returnArrayById($modelMovimientosM->listadoUltimoMovimiento($id_tbl_empleados_hraes));
        if ($ultimoMovimiento[0] == $baja){///Se tengan registros de algo que sea disntinto de alta
            $bool = true;///Variable cambia a true para continuar con el registro
        }
    } else { ///No exiten registros en la tabla 
        $bool = true;///Para dar de alta es necesario que no existan registros en la tabla
    }
}

if ($id_movimiento == $movimiento){///CODIGO DE MOVIMIENTO DE USUARIOS
    $mensaje = 'Para asignar un movimiento es necesario una alta o movimiento'; /// variable de mensaje
    if ($count[0] != 0){///Existen registros en la tabla
        ///Se consulta el ultimo movimiento
        $ultimoMovimiento = $row->returnArrayById($modelMovimientosM->listadoUltimoMovimiento($id_tbl_empleados_hraes));
        if ($ultimoMovimiento[0] != $baja){///Se tengan registros de algo que sea disntinto de baja
            $bool = true;///Variable cambia a true para continuar con el registro
        }
    } 
}

if ($id_movimiento == $baja){///CODIGO DE BAJA DE USUARIOS
    $mensaje = 'Para asignar una baja es necesario una alta o movimiento'; /// variable de mensaje
    if ($count[0] != 0){///Existen registros en la tabla
        ///Se consulta el ultimo movimiento
        $ultimoMovimiento = $row->returnArrayById($modelMovimientosM->listadoUltimoMovimiento($id_tbl_empleados_hraes));
        $idPlaza = $row->returnArrayById($modelMovimientosM->listadoByIdPlaza($id_tbl_empleados_hraes));
        $id_plaza_x = $idPlaza[0];
        if ($ultimoMovimiento[0] != $baja){///Se tengan registros de algo que sea disntinto de baja
            $bool = true;///Variable cambia a true para continuar con el registro
        }
    } 
}


$row = [
    'bool' => $bool,
    'mensaje' => $mensaje,
    'id_plaza_x' => $id_plaza_x
];

echo json_encode($row);

*/