<?php
include '../../../conexion.php';
include '../../Model/Usuarios/UsuariosM.php';

$listarUsuario = new modelUsuario();

$query = $listarUsuario->listarUsuarioAll();

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listarUsuario -> listarUsuarioByLike($busqueda);
}

$data =
    '<table class="table table-striped" id="t-usuarios" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">Nombre</th>
            <th style="color: white;">Edad</th>
            <th style="color: white;">Fecha de nacimiento</th>
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
                                <button onclick="agregarEditarDetalles(' . $row['id_usuarios_pk'] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarUsuario(' . $row['id_usuarios_pk'] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row['nombre'] . '
                            </td>
                            <td>
                                ' . $row['edad'] . '
                            </td>
                            <td>
                                ' . $row['fecha_nacimiento'] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


