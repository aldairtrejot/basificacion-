<?php

include '../librerias.php';

$modelDatosEmpleadoM = new modelDatosEmpleadoM();

$condicion = [
    'id_tbl_datos_empleado_hraes' => $_POST['id_tbl_datos_empleado_hraes']
];

$datos = [
    'id_cat_genero_hraes' => $_POST['id_cat_genero_hraes'],
    'id_cat_estado_civil_hraes' => $_POST['id_cat_estado_civil_hraes'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'pais_nacimiento' => $_POST['pais_nacimiento'],
];


if ($_POST['id_tbl_datos_empleado_hraes'] != null) { //Modificar
    if ($modelDatosEmpleadoM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelDatosEmpleadoM->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}


