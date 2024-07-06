<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$tableName = 'bi_fomope_edomex';


$truncateStatus = $model->truncateFomope($tableName);
$queryAllstatus = $model->fomopeQueryAll($tableName);
$updateStatus = $model->updateFomope($tableName);

$bool = false;

if ($truncateStatus && $queryAllstatus  && $updateStatus){
    $bool = true;
}


$var = [
    'bool' => $bool,
];


echo json_encode($var);

