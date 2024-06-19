<?php
include '../librerias.php';

$modelMovimientosM = new ModelMovimientosM();
$row = new Row();

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
