<?php
include '../librerias.php';

$modelDomicilioM = new ModelDomicilioM();
$catSepomexC = new CatSepomexC();
$catSepomexM = new CatSepomexM();
$row = new Row();

$id_object = $_POST['id_object'];
$domicilioCount = $row->returnArrayById($modelDomicilioM->selectCountById($id_object));

if ($domicilioCount[0] != 0) { ///MODIFICAR
    $response = $row -> returnArray($modelDomicilioM ->listarByIdEdit($id_object));
    $municipio = $catSepomexC->selectMunicipioByCp($catSepomexM->listarByCp($response['codigo_postal1']),$response['municipio1']);
    $colonia = $catSepomexC->selectMunicipioByCp($catSepomexM->listarColonia($response['municipio1'],$response['colonia1']),$response['colonia1']);
    $var = [
        'response' => $response,
        'municipio' => $municipio,
        'colonia' => $colonia,
        'pais' => 'México',
    ];
    echo json_encode($var);

} else { ///AGREGAR OK
    $var = [
        'response' => $response = $modelDomicilioM->listarByNull(),
        'municipio' => $municipio = $catSepomexC->selecByNull(),
        'colonia' => $colonia = $catSepomexC->selecByNull(),
        'pais' => 'Pais',
    ];
    echo json_encode($var);
}
