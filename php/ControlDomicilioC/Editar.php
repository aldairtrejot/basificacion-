<?php
include ('../../validar_sesion.php');
include ("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas'];
$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_domicilios = $_POST['id_tbl_domicilios'];
$id_tbl_datos_empleado = $_POST['id_tbl_datos_empleado'];
$crypt = base64_encode($id_tbl_empleados);

$entidad1 = $_POST['entidad1'];
$municipio1 = $_POST['municipio1'];
$colonia1 = $_POST['colonia1'];
$codigo_postal1 = $_POST['codigo_postal1'];
$calle1 = $_POST['calle1'];
$num_exterior1 = $_POST['num_exterior1'];
$num_interior1 = $_POST['num_interior1'];
$id_estatus1 = $_POST['id_estatus1'];

$entidad2 = $_POST['entidad2'];
$municipio2 = $_POST['municipio2'];
$colonia2 = $_POST['colonia2'];
$codigo_postal2 = $_POST['codigo_postal2'];
$calle2 = $_POST['calle2'];
$num_exterior2 = $_POST['num_exterior2'];
$num_interior2 = $_POST['num_interior2'];
$id_estatus2 = $_POST['id_estatus2'];

$esdireccion_fiscal2 = 'No';
$esdireccion_fiscal1 = 'No';

if (isset($_POST['esdireccion_fiscal2'])) {
    $esdireccion_fiscal2 = $_POST['esdireccion_fiscal2'];
}

if (isset($_POST['esdireccion_fiscal1'])) {
    $esdireccion_fiscal1 = $_POST['esdireccion_fiscal1'];
}


///SE CARGAN LOS ARRAY
///CONDICION PARA ACTUALIZACION
$arrayCondition = [
    'id_tbl_domicilios' => $id_tbl_domicilios
];

/// SE CARGA LA INFORMACION EN UN ARRAY
$arrayDate = [
    'entidad1' => $entidad1,
    'municipio1' => $municipio1,
    'colonia1' => $colonia1,
    'codigo_postal1' => $codigo_postal1,
    'calle1' => $calle1,
    'num_exterior1' => $num_exterior1,
    'num_interior1' => $num_interior1,
    'id_estatus1' => $id_estatus1,
    'esdireccion_fiscal1' => $esdireccion_fiscal1,
    'entidad2' => $entidad2,
    'municipio2' => $municipio2,
    'colonia2' => $colonia2,
    'codigo_postal2' => $codigo_postal2,
    'calle2' => $calle2,
    'num_exterior2' => $num_exterior2,
    'num_interior2' => $num_interior2,
    'id_estatus2' => $id_estatus2,
    'esdireccion_fiscal2' => $esdireccion_fiscal2,
    'id_tbl_datos_empleado' => $id_tbl_datos_empleado,
];

///VALIDACION PARA AGREGAR EDITAR
if ($id_tbl_domicilios != null) {
    ///CODIGO DE MODIFICAR
    $pgs_QRY = pg_update($connectionDBsPro, 'tbl_domicilios', $arrayDate, $arrayCondition);
    if ($pgs_QRY) {
        header("Location: ../../view/DatosEmpleado/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo); //Regreso a la tabla
    }
} else {
    ///CODIGO DE AGREGAR
    $pgs_QRY = pg_insert($connectionDBsPro, 'tbl_domicilios', $arrayDate);
    if ($pgs_QRY) {
        header("Location: ../../view/DatosEmpleado/Listar.php?D-F=" . $crypt . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo); //Regreso a la tabla
    }
}

