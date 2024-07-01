<?php
include '../librerias.php';

$modelRetardoM = new ModelRetardoM();
$bitacoraM = new BitacoraM();

$cat_asistencia_bas = $_POST['cat_asistencia_bas'];
$cat_estatus_bas = $_POST['cat_estatus_bas'];
$observaciones = $_POST['observaciones'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];

$hora = $_POST['hora'];
$fecha = $_POST['fecha'];

$condicion = [
    'id_ctrl_asistencia_bas' => $_POST['id_object']
];

if ($cat_asistencia_bas == 2){
    $datos = [
        'fecha' => $_POST['fecha'],
        'hora' => $_POST['hora'],
        'id_cat_asistencia_bas' => $_POST['cat_asistencia_bas'],
        'id_cat_estatus_bas' => $_POST['cat_estatus_bas'],
        'observaciones' => $_POST['observaciones'],
        'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    ];
} else {
    $datos = [
        'fecha' => $_POST['fecha'],
        'hora' => $_POST['hora'],
        'id_cat_asistencia_bas' => $_POST['cat_asistencia_bas']
    ];
}


$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    $idEmp = $_POST['id_tbl_empleados_hraes'];
    //if ($modelRetardoM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        if ($cat_asistencia_bas == 2){
            $update = pg_query("UPDATE ctrl_asistencia_bas SET
                            fecha = $fecha,
                            id_cat_asistencia_bas = $cat_asistencia_bas,
                            id_cat_estatus_bas = $cat_estatus_bas,
                            hora = '$hora',
                            observaciones = '$observaciones'
                            WHERE id_tbl_empleados_hraes = $idEmp;");
        } else 
        {
            $update = pg_query("UPDATE ctrl_asistencia_bas SET
            fecha = '$fecha'
            WHERE id_tbl_empleados_hraes = $id_tbl_empleados_hraes;");
        }
      
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_asistencia_bas',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    //}

}  else { //Agregar
    if ($cat_asistencia_bas == 2){
    $save = pg_query("INSERT INTO ctrl_asistencia_bas (fecha, hora, observaciones, id_tbl_empleados_hraes, id_cat_asistencia_bas, id_cat_estatus_bas)
                        SELECT CURRENT_DATE, CURRENT_TIME, '$observaciones', $id_tbl_empleados_hraes, $cat_asistencia_bas,$cat_estatus_bas");
    } else {
        $save = pg_query("INSERT INTO ctrl_asistencia_bas (fecha, hora, id_tbl_empleados_hraes, id_cat_asistencia_bas)
                        SELECT CURRENT_DATE, CURRENT_TIME, $id_tbl_empleados_hraes, $cat_asistencia_bas");
    }
    if ($save) {
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_asistencia_bas',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}

