<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/EspecialidadM/EspecialidadM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];

$modelEspecialidadM = new ModelEspecialidadM();

$listado = $modelEspecialidadM->listarById($id_tbl_empleados_hraes, $paginador);
if (isset($_POST['busqueda'])) {
    $listado = $modelEspecialidadM->listarByBusqueda($id_tbl_empleados_hraes, $_POST['busqueda'], $paginador);
}
$data =
    '<table class="table table-sm" id="tabla_especialidad" style="width:100%">
    <thead>
        <tr>
            <th style="background:#e5e7e8" class="text-center">Acciones</th>
            <th style="background:#e5e7e8">Especialidad</th>
        </tr>
    </thead>';

if (pg_num_rows($listado) > 0) {
    while ($row = pg_fetch_row($listado)) {
        $data .=
            '<tbody>
                        <tr>
                            <td class="text-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sucess dropdown-toggle table-button-style btn btn-light boton-con-imagen_table" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../../../assets/icons/editar.png" alt="Imagen del botón"></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarEspecialidad(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <button onclick="eliminarEspecialidad(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
