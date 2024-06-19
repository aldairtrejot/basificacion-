<?php
include '../librerias.php';

$catSepomexC = new CatSepomexC();
$catSepomexM = new CatSepomexM();
$row = new Row();

$municipio1 = $_POST['municipio1'];

$colonia = $catSepomexC->selectByAll($catSepomexM->listarColoniaByMumnp($municipio1));
$var = [
    'colonia' => $colonia
];
echo json_encode($var);
