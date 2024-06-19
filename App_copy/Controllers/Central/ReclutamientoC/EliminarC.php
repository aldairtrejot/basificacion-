<?php 
include '../../../../conexion.php';
include '../../../Model/Central/ReclutamientoM/ReclutamientoM.php';

$model = new modelReclutamiento();

$condicion = [
    'id_tbl_empleados_rec' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
