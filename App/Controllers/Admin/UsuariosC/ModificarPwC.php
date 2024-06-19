<?php
include '../librerias.php';

$modelUsuariosM = new UsuariosM();

$condicion = [
    'id_user' => $_POST['id_user']
];

$datos = [
    'password' => MD5($_POST['pw_nueva']),
];

if ($_POST['id_user'] != null) { //Modificar
    if ($modelUsuariosM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

}


