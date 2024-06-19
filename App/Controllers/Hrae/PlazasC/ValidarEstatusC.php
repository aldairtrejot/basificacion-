<?php

include '../librerias.php';

$modelMovimientosM = new ModelMovimientosM();
$row = new Row();

$id_cat_plazas = $_POST['id_cat_plazas'];
$id_object = $_POST['id_object'];
$idMovimiento = 3; //id_movimiento = baja;
$idPlaza = 3; ///id_cat_plazas = ocupada in table cat_plazas

$message = 'No es posible modificar el tipo de plaza asignada a un empleado.';
$bool = false;
$countPlazas = $row->returnArrayById($modelMovimientosM->countPlazasById($id_object));

if ($countPlazas[0] != 0) {
    $countEstatus = $row->returnArrayById($modelMovimientosM->ultimoMovimientoByVal($id_object));
    if ($countEstatus[1] == $id_object) {
        if ($countEstatus[0] != $idMovimiento && $id_cat_plazas != $idPlaza) {
            $bool = true;
        }
    }

    /*
    if ($countEstatus[0] != $idMovimiento && $id_cat_plazas != $idPlaza) { ///Condicion distinto de baja, entra error
        $bool = true; ///Error al actualizar el estatus
    }*/
}

$var = [
    'message' => $message,
    'bool' => $bool,
];
echo json_encode($var);