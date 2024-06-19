<?php

include '../ControlJuguetesC/PagoJuguetes.php';
include '../DependientesEcoMC/CargaMasiva.php';

$id_cat_carga_masiva = $_POST['id_cat_carga_masiva'];
$id_cat_fecha_juguetes_new = $_POST['id_cat_fecha_juguetes'];
$archivo = $_POST['archivo'];

switch ($id_cat_carga_masiva) {
    case '1':
        CargaDependientesJuguetes($archivo,$id_cat_fecha_juguetes_new,$id_cat_carga_masiva);
        break;
    case '2':
        pagoJuguetes($archivo,$id_cat_fecha_juguetes_new,$id_cat_carga_masiva);
        break;
}

