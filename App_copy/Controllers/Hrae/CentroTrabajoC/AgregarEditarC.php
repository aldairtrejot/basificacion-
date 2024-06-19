<?php
include '../../../View/validar_sesion.php';
include '../../../../conexion.php';
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';
include '../../../Model/Hraes/BitacoraM/BitacoraM.php';

$model = new modelCentroTrabajoHraes();
$bitacoraM = new BitacoraM();
$tablaCentroTrabajo = 'tbl_centro_trabajo_hraes';

$condicion = [
    'id_tbl_centro_trabajo_hraes' => $_POST['id_object']
];

$datos = [
    'id_cat_entidad' => $_POST['id_cat_entidad'],
    'id_cat_region' => $_POST['id_cat_region'],
    'id_estatus_centro' => $_POST['id_estatus_centro'],
    'nombre' => $_POST['nombre'],
    'clave_centro_trabajo' => $_POST['clave_centro_trabajo'],
    'colonia' => $_POST['colonia'],
    'codigo_postal' => $_POST['codigo_postal'],
    'num_exterior' => $_POST['num_exterior'],
    'num_interior' => $_POST['num_interior'],
    'latitud' => $_POST['latitud'],
    'longitud' => $_POST['longitud'],
    'pais' => $_POST['pais'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($model->editarByArray($connectionDBsPro, $datos, $condicion,$tablaCentroTrabajo)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaCentroTrabajo,
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        pg_insert($connectionDBsPro,'bitacora_hraes',$dataBitacora);
        echo 'edit';
    }

} else { //Agregar
    if ($model->agregarByArray($connectionDBsPro, $datos,$tablaCentroTrabajo)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaCentroTrabajo,
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        pg_insert($connectionDBsPro,'bitacora_hraes',$dataBitacora);
        echo 'add';
    }
}
