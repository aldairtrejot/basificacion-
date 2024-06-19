<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';

$listado = new modelEmpleadosHraes();
$paginador = $_POST['paginador'];

$query = $listado->listarByAll($paginador);

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda,$paginador);
}

$data =
    '<table class="table table-striped table-small-rows" id="t-table" style="width:100%">
    <thead>
        <tr class="table-tittle-color">
            <th class="custom-text-table-tittle col-md-1 text-center">Acciones</th>
            <th class="custom-text-table-tittle">Nombre</th>
            <th class="custom-text-table-tittle">Curp</th>
            <th class="custom-text-table-tittle">Rfc</th>
            <th class="custom-text-table-tittle">N&uacutem. empleado</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $data .=
            '<tbody style="background-color: white;">
                        <tr>
                            <td class="text-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sucess dropdown-toggle table-button-style btn btn-light boton-con-imagen_table" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../../../assets/icons/editar.png" alt="Imagen del botón"></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>
                                <form action="../Modulo/index.php" method="POST">
                                        <input type="hidden" id="postId" name="id_tbl_empleados_hraes" value="' . $row['id_tbl_empleados_hraes'] . '" />
                                        <button onclick="datosEmpleadosGetDetails(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/Empleado/datos_comple.png" alt="Imagen del botón"> Datos complementarios</button> 
                                </form>
                                <hr>
                                <button onclick="eliminarEntity(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button> 
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row['nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . '
                            </td>
                            <td>
                                ' . $row['curp'] . '
                            </td>
                            <td>
                                ' . $row['rfc'] . '
                            </td>
                            <td>
                                ' . $row['num_empleado'] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;


