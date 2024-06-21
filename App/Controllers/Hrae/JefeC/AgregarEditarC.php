<?php
include '../librerias.php';

$modelJefeM = new ModelJefeM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_lengua_idioma' => $_POST['id_object']
];

$datos = [
    'id_cat_lengua_idioma' => $_POST['id_cat_lengua_idioma'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelJefeM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_lengua_idioma',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelJefeM->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_lengua_idioma',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}

