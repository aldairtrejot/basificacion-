<?php
include '../librerias.php';

$clabeSub = $_POST['clabeSub'];
$catBancoM = new CatBancoM();
$row = new row();

$count = $row->returnArrayById($catBancoM->listarByCount($clabeSub));
$var = [
    'nombre' => $nombre = 'Sin registro',
    'id' => $id = null
];
if ($count[0] != 0) {
    $listado = $row->returnArrayById($catBancoM->listarById($clabeSub));
    $nombre = $listado[2];
    $id = $listado[1];
    $var = [
        'nombre' => $nombre,
        'id' => $id
    ];
}

echo json_encode($var);
