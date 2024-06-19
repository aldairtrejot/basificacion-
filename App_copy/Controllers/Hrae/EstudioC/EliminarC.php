<?php
include '../librerias.php';

$modelEstudioM = new ModelEstudioM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_estudios_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelEstudioM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_estudios_hraes',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'delete';
    }
} 
