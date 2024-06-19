<?php
include '../librerias.php';

$modelCamposPersM = new ModelCamposPersM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_campos_pers_hraes' => $_POST['id_ctrl_campos_pers_hraes']
];

$datos = [
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'porcentaje_ahorro_s' => $_POST['porcentaje_ahorro_s'],
    'dias_medio_sueldo' => $_POST['dias_medio_sueldo'],
    'dias_sin_sueldo' => $_POST['dias_sin_sueldo'],
    'reintegro_faltas_retardos' => $_POST['reintegro_faltas_retardos'],
    'porcentaje_svi' => $_POST['porcentaje_svi'],
    'importe_festivo' => $_POST['importe_festivo'],
    'importe_horas_ex' => $_POST['importe_horas_ex'],
    'importe_prima_dominical' => $_POST['importe_prima_dominical'],
    'importe_descuentos_indebidos' => $_POST['importe_descuentos_indebidos'],
    'importe_recuperacion_pagos_indebidos' => $_POST['importe_recuperacion_pagos_indebidos'],
    'dias_sansion_adma' => $_POST['dias_sansion_adma'],
    'regimen_pen' => $_POST['regimen_pen'],
    'quinquenio' => $_POST['quinquenio'],
    'num_hijos' => $_POST['num_hijos'],
    'num_dias_jornada_dominical' => $_POST['num_dias_jornada_dominical'],
    'num_dias_guardia_festiva' => $_POST['num_dias_guardia_festiva'],
    'aplicar_juguetes' => $_POST['aplicar_juguetes'],
    'apoyo_titulacion' => $_POST['apoyo_titulacion'],
    'licencia_manejo' => $_POST['licencia_manejo'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_ctrl_campos_pers_hraes'] != null) { //Modificar
    if ($modelCamposPersM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_campos_pers_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelCamposPersM->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_campos_pers_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}


