<?php
include '../librerias.php';

$catSepomexC = new CatSepomexC();
$catSepomexM = new CatSepomexM();
$row = new Row();

$codigo_postal = $_POST['codigo_postal'];
$countCodigo = $row->returnArrayById($catSepomexM->listarCountCp($codigo_postal));


if ($countCodigo[0] != 0) {
    $entidad = $row->returnArrayById($catSepomexM->listarEntidadByCp($codigo_postal));
    $municipio = $catSepomexC->selectByAll($catSepomexM->listarMunicipioByCp($codigo_postal));
    $var = [
        'municipio' => $municipio,
        'colonia' => $colonia = $catSepomexC->selecByNull(),
        'entidad' => $entidad,
        'pais' => $pais = 'MÉXICO',
    ];
    echo json_encode($var);
} else {
    $var = [
        'municipio' => $municipio = $catSepomexC->selecByNull(),
        'colonia' => $colonia = $catSepomexC->selecByNull(),
        'entidad' => $entidad = 'No encontrado',
        'pais' => $pais = 'No encontrado',
    ];
    echo json_encode($var);
}



/*
if ($domicilioCount[0] != 0) {
    $response = $row -> returnArray($modelDomicilioM ->listarByIdEdit($id_object));
    $municipio = $catSepomexC->selectMunicipioByCp($catSepomexM->listarByCp($response['codigo_postal1']),$response['municipio1']);
    $colonia = $catSepomexC->selecStaticText($response['colonia1']);
    $var = [
        'response' => $response,
        'municipio' => $municipio,
        'colonia' => $colonia,
    ];
    echo json_encode($var);

} else {
    $var = [
        'response' => $response = null,
        'municipio' => $municipio = null,
        'colonia' => $colonia = null,
    ];
    echo json_encode($var);
}
*/