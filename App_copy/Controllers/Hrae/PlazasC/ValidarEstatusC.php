<?php

include '../librerias.php';

$id_cat_plazas = $_POST['id_cat_plazas'];
$id_object = $_POST['id_object'];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];
echo json_encode($var);