<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelJefeM = new ModelJefeM();
$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelJefeM->listarByIdCedula($id_object));
    $valueCat = $row->returnArrayById($modelJefeM->editCatalog($response['id_cat_lengua_idioma']));

    $catalogoLengua = selectByEditCatalogoX($modelJefeM->listadoIdiomas(),$valueCat);
    $var = [
        'response' => $response,
        'catalogoLengua' => $catalogoLengua,
    ];
    echo json_encode($var);

} else {
    $response = $modelJefeM->listarByNull();
    $catalogoLengua = selectByAllX($modelJefeM->listadoIdiomas());
    $var = [
        'response' => $response,
        'catalogoLengua' => $catalogoLengua,
    ];
    echo json_encode($var);
}




function selectByAllX($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row [0] . '">' . $row [1] . '</option>';
        }
        return $options;
    }


    function selectByEditCatalogoX($all, $edit)
    {
        $options = '<option value="' . $edit[0] . '">' . $edit[1] . '</option>';
        while ($row = pg_fetch_array($all)) {
            if ($row[0] != $edit[0]) {
                $options .= '<option value="' . $row[0] . '">' . $row[1]. '</option>';
            }
        }
        return $options;
    }