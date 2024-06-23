<?php
include '../librerias.php';

$id_object_d = $_POST['id_object'];
$modelJuguetesM = new ModelJuguetesM();
$row = new row();

if ($id_object_d != null) {
    $response = $row->returnArray($modelJuguetesM->listarEditById($id_object_d));
    $test = catalogoAllEdit_j(catalogo_j('cat_test_bas'),$row->returnArrayById(catalogoEdit_j('cat_test_bas','id_cat_test_bas',$response['id_cat_test_bas'])));
    $estatus = catalogoAllEdit_j(catalogo_j('cat_estatus_test'),$row->returnArrayById(catalogoEdit_j('cat_estatus_test','id_cat_estatus_test',$response['id_cat_estatus_test'])));

    $var = [
        'test_j' => $test,
        'estatus_j' => $estatus,
    ];

} else {
    $test = catalogoAll_j(catalogo_j('cat_test_bas'));
    $estatus = catalogoAll_j(catalogo_j('cat_estatus_test'));
    
    $var = [
        'test_j' => $test,
        'estatus_j' => $estatus,
    ];
}

echo json_encode($var);




function catalogo_j($tableName){
    $listado = pg_query("SELECT *
                        FROM $tableName
                        ORDER BY nombre");
    return $listado;
}

function catalogoEdit_j($tableName, $id, $value){
    $listado = pg_query("SELECT *
                        FROM $tableName
                        WHERE $id = $value");
    return $listado;
}

function catalogoAll_j($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row [0] . '">' . $row [1] . '</option>';
        }
        return $options;
    }

    function catalogoAllEdit_j($resultados, $value)
    {
        $options = '<option value="' . $value [0] . '">' . $value [1] . '</option>';
        while ($row = pg_fetch_array($resultados)) {
            if ($row [0] != $value[0]){
                $options .= '<option value="' . $row [0] . '">' . $row [1] . '</option>';
            }
        }
        return $options;
    }