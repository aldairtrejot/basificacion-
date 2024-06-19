<?php

include 'Listar.php';
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

///OBTENER VARIABLE
//$id_cat_fecha_juguetes = $_POST['id_cat_fecha_juguetes'];

function exportarExel($id_cat_fecha_juguetes)
{

    ///ELIMINAR EL ANTERIOR ARCHIVO PARA NO SOBREECRIBIR
    unlink('../../assets/documents/templateData/pagoJuguetes.xlsx');

    ///CONDICION DE LISTADO
    $data = pg_fetch_all(juguetesByExportExel($id_cat_fecha_juguetes));

    ///CREACION DE LA HOJA DE ESTILO
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    ///HOJA DE ESTILO PARA EXEL (TITULO)
    $styleTitle = [
        'font' => [
            'bold' => true, ///LETRAS NEGRITAS
            'size' => 13 ///TAMAÑO DE LETRA
        ]
    ];

    ///NOMBRE DE CABECERA PARA LAS COLUMNAS
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Estado')
        ->setCellValue('B1', 'Zona de pago')
        ->setCellValue('C1', 'Tipo de trabajador')
        ->setCellValue('D1', 'Rfc')
        ->setCellValue('E1', 'Número de plaza')
        ->setCellValue('F1', 'Nombre completo')
        ->setCellValue('G1', 'Cargo')
        ->setCellValue('H1', 'Código de puesto')
        ->setCellValue('I1', 'Total de beneficiarios');

    ///APLICACION DE ESTILO A CADA FILA Y  COLOR
    $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('B1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('C1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('D1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('E1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('F1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('G1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('H1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');
    $spreadsheet->getActiveSheet()->getStyle('I1')->applyFromArray($styleTitle)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('DDC9A3');

    // Escribir los datos en la hoja de cálculo
    $row = 2;
    foreach ($data as $row_data) {
        $col = 1;
        foreach ($row_data as $cell_data) {
            $sheet->setCellValueByColumnAndRow($col, $row, $cell_data);
            $col++;
        }
        $row++;
    }

    // Guardar la hoja de cálculo en un archivo Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'pagoJuguetes.xlsx';
    $writer->save('../../assets/documents/templateData/pagoJuguetes.xlsx');

    //echo "Los datos se han exportado correctamente a '$filename'.";

    $rutaArchivo = '../../assets/documents/templateData/pagoJuguetes.xlsx'; // Cambia esto por la ruta real de tu archivo

    // Nombre del archivo que se descargará
    $nombreArchivo = 'pagoJuguetes.xlsx'; // Cambia esto por el nombre que deseas para el archivo descargado

    // Verificar si el archivo existe
    if (file_exists($rutaArchivo)) {
        // Configurar las cabeceras para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($rutaArchivo));
        // Leer el archivo y enviarlo al cliente
        readfile($rutaArchivo);
        exit;
    } else {
        // Si el archivo no existe, mostrar un mensaje de error
        echo "El archivo no existe.";
    }
}