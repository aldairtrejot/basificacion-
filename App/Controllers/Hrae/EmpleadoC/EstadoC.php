<?php
include '../librerias.php';

$catEstadoC = new CatEstadoC();
$catEstadoM = new CatEstadoM();

$id_cat_pais_nacimiento = $_POST['id_cat_pais_nacimiento'];

$estado = $catEstadoC->selectByAll($catEstadoM->listarEstado($id_cat_pais_nacimiento));

$var = [
    'estado' => $estado,
];
echo json_encode($var);