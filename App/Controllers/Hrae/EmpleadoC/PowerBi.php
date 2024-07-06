<?php
include '../librerias.php';

$model = new modelEmpleadosHraes();
$tableName = 'bi_fomope_edomex';


$truncateStatus = $model->truncateFomope($tableName);
$queryAllstatus = $model->fomopeQueryAll($tableName);
$updateStatus = $model->updateFomope($tableName);

$bool = false;
$message = 'ok';

if ($truncateStatus){
    if($queryAllstatus){
        if ($updateStatus){
            $bool = true;
        } else {
            $message = 'Error en update';
        }
    } else {
        $message = 'Error en insert';
    }
} else {
    $message = 'Error en truncate';
}


$var = [
    'bool' => $bool,
    'message' => $message,
];


echo json_encode($var);

