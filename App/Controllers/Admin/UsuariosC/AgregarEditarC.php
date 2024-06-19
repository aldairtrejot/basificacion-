<?php
include '../librerias.php';

$modelUsuariosM = new UsuariosM();

$condicion = [
    'id_user' => $_POST['id_object']
];

$datos = [
    'nick' => $_POST['nick'],
    'nombre' => $_POST['nombre'],
    'password' => MD5($_POST['password']),
    'status' => true,
    'id_rol' => $_POST['id_rol']
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelUsuariosM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelUsuariosM->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}


