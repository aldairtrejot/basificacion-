<?php
include '../librerias.php';

$row = new Row();
$bitacoraM = new BitacoraM();
$catMovimientoM = new CatMovimientoM();
$modelMovimientosM = new ModelMovimientosM();
$nombreTabla = 'tbl_plazas_empleados_hraes';
$idMovimiento = $row->returnArrayById($catMovimientoM->listadoIdMovimiento($_POST['id_tbl_movimientos']));

$condicion = [
    'id_tbl_plazas_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'fecha_inicio' => $_POST['fecha_inicio'],
    'fecha_termino' => $_POST['fecha_termino'],
    'id_tbl_movimientos' => $_POST['id_tbl_movimientos'],
    'fecha_movimiento' => $_POST['fecha_movimiento'],
    'id_tbl_control_plazas_hraes' => $_POST['id_tbl_control_plazas_hraes'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelMovimientosM->editarByArray($connectionDBsPro, $datos, $condicion, $nombreTabla)) {
        modificarPlaza($connectionDBsPro,$_POST['id_tbl_control_plazas_hraes'], $idMovimiento[0]);
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelMovimientosM->agregarByArray($connectionDBsPro, $datos, $nombreTabla)) {
        modificarPlaza($connectionDBsPro,$_POST['id_tbl_control_plazas_hraes'], $idMovimiento[0]);
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}



function modificarPlaza($connectionDBsPro,$idPlaza, $idMovimiento)
{
    $model = new modelPlazasHraes();

    $condicion = [
        'id_tbl_control_plazas_hraes' => $idPlaza
    ];
    ///VARIABLES
    $baja = 3; ///CATALOGO de movimientos
    $vacante = 5;///CATALOGO
    $ocupada = 3;///CATALOGO
    //$idMovimientoVal = null;
    if ($idMovimiento != $baja){
        $idMovimientoVal = $ocupada;
    } else {
        $idMovimientoVal = $vacante;
    }

    $datos = [
        'id_cat_plazas' => $idMovimientoVal,
    ];

    $model->editarByArray($connectionDBsPro, $datos, $condicion);
}

