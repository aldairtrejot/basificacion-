<?php
include '../../../../conexion.php';
include '../../../Model/Central/ReclutamientoM/ReclutamientoM.php';

$listado = new modelReclutamiento();

$query = $listado->listarByAll();

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda);
}

$data =
    '<table class="table table-striped" id="t-table" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">Nombre</th>
            <th style="color: white;">Curp</th>
            <th style="color: white;">Rfc</th>
            <th style="color: white;">Nss</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row['id_tbl_empleados_rec'] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarEntity(' . $row['id_tbl_empleados_rec'] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>  
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
                                ' . $row['nss'] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


