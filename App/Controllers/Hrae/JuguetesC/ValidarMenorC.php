<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$curp= $_POST['curp_j'];
$id_cat_fecha_juguete = $_POST['id_cat_fecha_juguetes_j'];
$modelJuguetesM = new ModelJuguetesM();
$row = new row();
$bool = false;

if ($id_object != ''){ //add
    $listado = $row->returnArrayById($modelJuguetesM ->validarMenorEdit($curp,$id_cat_fecha_juguete,$id_object));
    if ($listado[0] != 0){
        $bool = true; //Ya se encuentra una curp en el sistema
    }
} else {//edit
    $listado = $row->returnArrayById($modelJuguetesM ->validarMenorAdd($curp,$id_cat_fecha_juguete));
    if ($listado[0] != 0){ 
        $bool = true; //Ya se encuentra una curp en el sistema
    }
}

echo json_encode($bool);
