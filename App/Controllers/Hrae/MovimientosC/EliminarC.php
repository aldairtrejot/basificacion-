<?php
include '../librerias.php';

$modelMovimientosM = new ModelMovimientosM();
$bitacoraM = new BitacoraM();
$nombreTabla = 'tbl_plazas_empleados_hraes';

$condicion = [
    'id_tbl_plazas_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelMovimientosM-> eliminarByArray($connectionDBsPro, $condicion,$nombreTabla)){
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'delete';
    }
} 
