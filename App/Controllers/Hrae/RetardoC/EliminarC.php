<?php
include '../librerias.php';

$modelRetardoM = new ModelRetardoM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_asistencia_bas' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelRetardoM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_asistencia_bas',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'delete';
    }
} 
