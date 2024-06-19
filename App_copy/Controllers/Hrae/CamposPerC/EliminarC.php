<?php 
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';

$model = new modelEmpleadosHraes();

$condicion = [
    'id_tbl_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
