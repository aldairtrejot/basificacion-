<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/JefeM/JefeM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];

$modelJefeM = new ModelJefeM();

$listado = $modelJefeM->listarById($id_tbl_empleados_hraes, $paginador);
if (isset($_POST['busqueda'])) {
    $listado = $modelJefeM->listarByBusqueda($id_tbl_empleados_hraes, $_POST['busqueda'], $paginador);
}
$data =
    '<table class="table table-bordered" id="tabla_jefe" style="width:100%">
    <thead>
        <tr>
            <th>Acciones</th>
            <th>Nombre</th>
        </tr>
    </thead>';

if (pg_num_rows($listado) > 0) {
    while ($row = pg_fetch_row($listado)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icono-pequeno-tabla"></i></button>
                        <div class="dropdown-menu">
                            <button onclick="agregarEditarJefe(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit icon-edit-table"></i> Modificar</button>
                            <button onclick="eliminarJefe(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt icon-delete-table"></i> Eliminar</button>  
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
