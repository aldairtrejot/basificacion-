<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';

$model = new modelCentroTrabajoHraes();

$id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];

$response = returnArray($model->listarByIdEdit($id_tbl_centro_trabajo_hraes));

$var = [
    'clave' => $response['clave_centro_trabajo'],
    'nombre' => $response['nombre'],
    'codigo_postal' => $response['codigo_postal'],
];
echo json_encode($var);


function returnArray($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    return $response;
}
