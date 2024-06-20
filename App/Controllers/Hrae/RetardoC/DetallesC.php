<?php
include '../librerias.php';

$id_objectDependiente = $_POST['id_object'];
$modelRetardoM = new ModelRetardoM();
$row = new row();

if ($id_objectDependiente != null) {
    $response = $row->returnArray($modelRetardoM->listarEditById($id_objectDependiente));
    $catalogo = catalogoAllEdit(catalogoAsistencia('cat_asistencia_bas'),$row->returnArrayById(catalogoAsistenciaEdit('cat_asistencia_bas', 'id_cat_asistencia_bas',$response['id_cat_asistencia_bas'])));
    
    if ($response['id_cat_estatus_bas'] == ''){
        $estatus = catalogoAll(catalogoAsistencia('cat_estatus_bas'));
    } else {
        $estatus = catalogoAllEdit(catalogoAsistencia('cat_estatus_bas'),$row->returnArrayById(catalogoAsistenciaEdit('cat_estatus_bas', 'id_cat_estatus_bas',$response['id_cat_estatus_bas'])));
    }
    
    $var = [
        'response' => $response,
        'catalogo' => $catalogo,
        'estatus' => $estatus,
    ];
    echo json_encode($var);

} else {
    $response = $modelRetardoM->listarByNull();
    $catalogo = catalogoAll(catalogoAsistencia('cat_asistencia_bas'));
    $estatus = catalogoAll(catalogoAsistencia('cat_estatus_bas'));
    $var = [
        'response' => $response,
        'catalogo' => $catalogo,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
}


function catalogoAsistencia($tableName){
    $listado = pg_query("SELECT *
                        FROM $tableName
                        ORDER BY nombre");
    return $listado;
}

function catalogoAsistenciaEdit($tableName, $id, $value){
    $listado = pg_query("SELECT *
                        FROM $tableName
                        WHERE $id = $value");
    return $listado;
}

function catalogoAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row [0] . '">' . $row [1] . '</option>';
        }
        return $options;
    }

    function catalogoAllEdit($resultados, $value)
    {
        $options = '<option value="' . $value [0] . '">' . $value [1] . '</option>';
        while ($row = pg_fetch_array($resultados)) {
            if ($row [0] != $value[0]){
                $options .= '<option value="' . $row [0] . '">' . $row [1] . '</option>';
            }
        }
        return $options;
    }

    function selecStaticByNullX()
    {
        $options = '<option value="' . '' . '">' . 'Seleccione' . '</option>';
        return $options;
    }