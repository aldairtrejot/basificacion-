<?php

include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$modelPlazasHraes = new modelPlazasHraes();
$id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];

if ($id_tbl_centro_trabajo_hraes != null) { /// is the value
    $idIDCentro = $id_tbl_centro_trabajo_hraes;
    $is_1 = isID($modelPlazasHraes->countIdpuesto(1,$idIDCentro)); //id_cat_puesto_hraes 1
    $is_2 = isID($modelPlazasHraes->countIdpuesto(2,$idIDCentro)); //id_cat_puesto_hraes 2
    $is_3 = isID($modelPlazasHraes->countIdpuesto(3,$idIDCentro)); //id_cat_puesto_hraes 3
    $is_4 = isID($modelPlazasHraes->countIdpuesto(4,$idIDCentro)); //id_cat_puesto_hraes 4
    $is_5 = isID($modelPlazasHraes->countIdpuesto(5,$idIDCentro)); //id_cat_puesto_hraes 5
    $is_6 = isID($modelPlazasHraes->countIdpuesto(6,$idIDCentro)); //id_cat_puesto_hraes 6
    $is_7 = isID($modelPlazasHraes->countIdpuesto(7,$idIDCentro)); //id_cat_puesto_hraes 7
    $is_8 = isID($modelPlazasHraes->countIdpuesto(8,$idIDCentro)); //id_cat_puesto_hraes 8
    $is_9 = isID($modelPlazasHraes->countIdpuesto(9,$idIDCentro)); //id_cat_puesto_hraes 9
    $is_10 = isID($modelPlazasHraes->countIdpuesto(10,$idIDCentro)); //id_cat_puesto_hraes 10
    $is_11 = isID($modelPlazasHraes->countIdpuesto(11,$idIDCentro)); //id_cat_puesto_hraes 11
    $is_12 = isID($modelPlazasHraes->countIdpuesto(12,$idIDCentro)); //id_cat_puesto_hraes 12
    $is_13 = isID($modelPlazasHraes->countIdpuesto(13,$idIDCentro)); //id_cat_puesto_hraes 13
    $is_14 = isID($modelPlazasHraes->countIdpuesto(14,$idIDCentro)); //id_cat_puesto_hraes 14
    $is_15 = isID($modelPlazasHraes->countIdpuesto(15,$idIDCentro)); //id_cat_puesto_hraes 15
    $is_16 = isID($modelPlazasHraes->countIdpuesto(16,$idIDCentro)); //id_cat_puesto_hraes 16
} else {
    $is_1 = isID($modelPlazasHraes->countIdpuestoSN(1)); //id_cat_puesto_hraes 1
    $is_2 = isID($modelPlazasHraes->countIdpuestoSN(2)); //id_cat_puesto_hraes 2
    $is_3 = isID($modelPlazasHraes->countIdpuestoSN(3)); //id_cat_puesto_hraes 3
    $is_4 = isID($modelPlazasHraes->countIdpuestoSN(4)); //id_cat_puesto_hraes 4
    $is_5 = isID($modelPlazasHraes->countIdpuestoSN(5)); //id_cat_puesto_hraes 5
    $is_6 = isID($modelPlazasHraes->countIdpuestoSN(6)); //id_cat_puesto_hraes 6
    $is_7 = isID($modelPlazasHraes->countIdpuestoSN(7)); //id_cat_puesto_hraes 7
    $is_8 = isID($modelPlazasHraes->countIdpuestoSN(8)); //id_cat_puesto_hraes 8
    $is_9 = isID($modelPlazasHraes->countIdpuestoSN(9)); //id_cat_puesto_hraes 9
    $is_10 = isID($modelPlazasHraes->countIdpuestoSN(10)); //id_cat_puesto_hraes 10
    $is_11 = isID($modelPlazasHraes->countIdpuestoSN(11)); //id_cat_puesto_hraes 11
    $is_12 = isID($modelPlazasHraes->countIdpuestoSN(12)); //id_cat_puesto_hraes 12
    $is_13 = isID($modelPlazasHraes->countIdpuestoSN(13)); //id_cat_puesto_hraes 13
    $is_14 = isID($modelPlazasHraes->countIdpuestoSN(14)); //id_cat_puesto_hraes 14
    $is_15 = isID($modelPlazasHraes->countIdpuestoSN(15)); //id_cat_puesto_hraes 15
    $is_16 = isID($modelPlazasHraes->countIdpuestoSN(16)); //id_cat_puesto_hraes 16
}



$raw = [
    'is_1' => $is_1[0],
    'is_2' => $is_2[0],
    'is_3' => $is_3[0],
    'is_4' => $is_4[0],
    'is_5' => $is_5[0],
    'is_6' => $is_6[0],
    'is_7' => $is_7[0],
    'is_8' => $is_8[0],
    'is_9' => $is_9[0],
    'is_10' => $is_10[0],
    'is_11' => $is_11[0],
    'is_12' => $is_12[0],
    'is_13' => $is_13[0],
    'is_14' => $is_14[0],
    'is_15' => $is_15[0],
    'is_16' => $is_16[0],
];
echo json_encode($raw);



function isID($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_row($result)) {
            $response = $row;
        }
    }
    return $response;
}