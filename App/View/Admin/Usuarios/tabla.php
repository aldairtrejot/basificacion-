<?php
include '../../../../conexion.php';
include '../../../Model/Admin/UsuariosM/UsuariosM.php';

$listado = new UsuariosM();
$paginador = $_POST['paginador'];

$query = $listado->listarByAll($paginador);


if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda,$paginador);
}

$data =
    '<table class="table table-bordered" id="tabla_usuarios" style="width:100%">
    <thead>
        <tr">
            <th>Acciones</th>
            <th>Nick</th>
            <th>Nombre</th>
            <th>Rol</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icono-grande-tabla"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarUsuarios(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit icon-edit-table"></i> Modificar</button>
                                <button onclick="eliminarUsuario(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt icon-delete-table"></i> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados.</h6>';
}

echo $data;


