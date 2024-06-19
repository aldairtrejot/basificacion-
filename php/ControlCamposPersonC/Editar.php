<?php
include ('../../validar_sesion.php');
include ("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_ctrl_campos_pers = $_POST['id_ctrl_campos_pers'];
$crypt = base64_encode($id_tbl_empleados);

$dias_medio_sueldo = $_POST['dias_medio_sueldo'];
$dias_sin_sueldo = $_POST['dias_sin_sueldo'];
$reintegro_faltas_retardo = $_POST['reintegro_faltas_retardo'];
$porcentaje_svi = $_POST['porcentaje_svi'];
$importe_festivo = $_POST['importe_festivo'];
$porcentaje_ahorro_s = $_POST['porcentaje_ahorro_s'];
$importe_horas_ex = $_POST['importe_horas_ex'];
$importe_prima_dominical = $_POST['importe_prima_dominical'];
$importe_descuentos_indevidos = $_POST['importe_descuentos_indevidos'];
$importe_recuperacion_pagos_indebidos = $_POST['importe_recuperacion_pagos_indebidos'];
$dias_sansion_adma = $_POST['dias_sansion_adma'];
$regimen_pen = $_POST['regimen_pen'];
$quinquenio = $_POST['quinquenio'];
$num_hijos = $_POST['num_hijos'];
$num_dias_jornada_dominical = $_POST['num_dias_jornada_dominical'];
$num_dias_guardia_festiva = $_POST['num_dias_guardia_festiva'];
$aplicar_juguetes = $_POST['aplicar_juguetes'];
$apoyo_titulacion = $_POST['apoyo_titulacion'];
$licencia_manejo = $_POST['licencia_manejo'];

$arrayCondition = [
    'id_ctrl_campos_pers' => $id_ctrl_campos_pers
];

/// SE CARGA LA INFORMACION EN UN ARRAY
$arrayDate = [
    'dias_medio_sueldo' => $dias_medio_sueldo,
    'dias_sin_sueldo' => $dias_sin_sueldo,
    'reintegro_faltas_retardos' => $reintegro_faltas_retardo,
    'porcentaje_svi' => $porcentaje_svi,
    'importe_festivo' => $importe_festivo,
    'porcentaje_ahorro_s' => $porcentaje_ahorro_s,
    'importe_horas_ex' => $importe_horas_ex,
    'importe_prima_dominical' => $importe_prima_dominical,
    'importe_descuentos_indebidos' => $importe_descuentos_indevidos,
    'importe_recuperacion_pagos_indebidos' => $importe_recuperacion_pagos_indebidos,
    'dias_sansion_adma' => $dias_sansion_adma,
    'regimen_pen' => $regimen_pen,
    'quinquenio' => $quinquenio,
    'num_hijos' => $num_hijos,
    'num_dias_jornada_dominical' => $num_dias_jornada_dominical,
    'num_dias_guardia_festiva' => $num_dias_guardia_festiva,
    'aplicar_juguetes' => $aplicar_juguetes,
    'apoyo_titulacion' => $apoyo_titulacion,
    'licencia_manejo' => $licencia_manejo,
    'id_tbl_empleados' => $id_tbl_empleados
];

///VALIDACION PARA AGREGAR EDITAR
if ($id_ctrl_campos_pers != null) {
    ///CODIGO DE MODIFICAR
    $pgs_QRY = pg_update($connectionDBsPro, 'ctrl_campos_pers', $arrayDate, $arrayCondition);
    if ($pgs_QRY) {
        header("Location: ../../view/Empleados/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo); //Regreso a la tabla
    }
} else {
    ///CODIGO DE AGREGAR
    $pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_campos_pers', $arrayDate);
    if ($pgs_QRY) {
        header("Location: ../../view/Empleados/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo); //Regreso a la tabla
    }
}

