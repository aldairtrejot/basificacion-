<?php

include '../ControlJuguetesC/ExportarExel.php';

/**
 * CATALOGO DE DESCARGAS 
 * ID   NOMBRE                    RUTA
 * 1    'ModuloJuguetes.xlsx'     '../../assets/documents/template/ModuloJuguetes.xlsx'
 * 2    'ModuloJuguetesPago.xlsx'     '../../assets/documents/template/ModuloJuguetesPago.xlsx'
 * 10
 */

$id_cat_plantilla = $_POST['id_cat_plantilla'];
$id_cat_fecha_juguetes = $_POST['id_cat_fecha_juguetes'];

switch ($id_cat_plantilla) {
    case '1':
        descargarPlantilla('../../assets/documents/template/ModuloJuguetes.xlsx','ModuloJuguetes.xlsx');
        break;
    case '2':
        descargarPlantilla('../../assets/documents/template/ModuloJuguetesPago.xlsx','ModuloJuguetesPago.xlsx');
        break;
    case '10':
        exportarExel($id_cat_fecha_juguetes);
        break;
}

function descargarPlantilla($rutaArchivo, $nombreArchivo)
{
    if (file_exists($rutaArchivo)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($rutaArchivo));
        readfile($rutaArchivo);
        exit;
    }
}

