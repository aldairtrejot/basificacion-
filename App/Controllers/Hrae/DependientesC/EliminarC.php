<?php
include '../librerias.php';

$modelDependientesM = new ModelDependientesM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_dependientes_economicos_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelDependientesM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'ctrl_dependientes_economicos_hraes',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'delete';
    }
} 
