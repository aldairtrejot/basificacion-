<?php
include '../librerias.php';

$modelJuguetesM = new ModelJuguetesM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_test_bas' => $_POST['id_object']
];

$datos = [
    'id_cat_estatus_test' => $_POST['cat_estatus_test'],
    'id_cat_test_bas' => $_POST['cat_test_bas'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelJuguetesM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_test_bas',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelJuguetesM ->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_test_bas',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}

