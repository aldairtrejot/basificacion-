<?php

include '../librerias.php';

$modelPlazasHraes = new modelPlazasHraes();
$row = new Row();

$allPlazas = $row->returnArrayById($modelPlazasHraes->allCountPlazas());
$bloqueada = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(1)); ///PLAZA BLOQUEADA
$cancelada = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(2)); ///PLAZA CANCELADA
$ocupada = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(3)); ///PLAZA OCUPADA
$reservada = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(4)); ///PLAZA RESERVADA
$vacante = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(5)); ///PLAZA VACANTE
$congelada = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(6)); ///PLAZA CONGELADA
$indefinida = $row->returnArrayById($modelPlazasHraes->tipoPlazaAll(7)); ///PLAZA INDEFINIDA

$var = [
    'allPlazas' => $allPlazas[0],
    'bloqueada' => $bloqueada[0],
    'cancelada' => $cancelada[0],
    'ocupada' => $ocupada[0],
    'reservada' => $reservada[0],
    'vacante' => $vacante[0],
    'congelada' => $congelada[0],
    'indefinida' => $indefinida[0],
];
echo json_encode($var);
