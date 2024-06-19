<?php
include '../../../../conexion.php';
include '../../../View/validar_sesion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';
include '../../../Model/Hraes/BitacoraM/BitacoraM.php';

$model = new modelPlazasHraes();
$bitacoraM = new BitacoraM();
$tablaPlazas = 'tbl_control_plazas_hraes';

$condicion = [
    'id_tbl_control_plazas_hraes' => $_POST['id_object']
];

$datos = [
    'id_cat_plazas' => $_POST['id_cat_plazas'],
    'id_cat_tipo_contratacion_hraes' => $_POST['id_cat_tipo_contratacion_hraes'],
    'id_cat_unidad_responsable' => $_POST['id_cat_unidad_responsable'],
    'id_cat_puesto_hraes' => $_POST['id_cat_puesto_hraes'],
    'id_cat_zonas_tabuladores_hraes' => $_POST['id_cat_zonas_tabuladores_hraes'],
    'id_cat_niveles_hraes' => $_POST['id_cat_niveles_hraes'],
    'id_tbl_zonas_pago_hraes' => $_POST['id_tbl_zonas_pago'],
    'num_plaza' => $_POST['num_plaza'],
    'fecha_ingreso_inst' => $_POST['fecha_ingreso_inst'],
    'fecha_inicio_movimiento' => $_POST['fecha_inicio_movimiento'],
    'fecha_termino_movimiento' => $_POST['fecha_termino_movimiento'],
    'fecha_modificacion' => $_POST['fecha_modificacion'],
    'id_tbl_centro_trabajo_hraes' => $_POST['id_tbl_centro_trabajo_hraes'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($model->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaPlazas,
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($model->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaPlazas,
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}


