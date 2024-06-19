<?php
include '../../../../conexion.php';
include '../../../Model/Central/ReclutamientoM/ReclutamientoM.php';

$model = new modelReclutamiento();

$condicion = [
    'id_tbl_empleados_rec' => $_POST['id_object']
];

$datos = [
    'nombre' => $_POST['nombre'],
    'rfc' => $_POST['rfc'],
    'primer_apellido' => $_POST['primer_apellido'],
    'curp' => $_POST['curp'],
    'segundo_apellido' => $_POST['segundo_apellido'],
    'nss' => $_POST['nss'],
];

if($_POST['id_object'] != null){ //Modificar
    if($model -> editarByArray($connectionDBsPro,$datos, $condicion)){
        echo 'edit';
    } 
} else { //Agregar
    if($model -> agregarByArray($connectionDBsPro,$datos)){
        echo 'add';
    } 
}


