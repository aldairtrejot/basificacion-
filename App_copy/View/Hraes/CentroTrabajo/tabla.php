<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';

$listado = new modelCentroTrabajoHraes();
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
            <th class="custom-text-table-tittle">Centro de trabajo</th>
            <th class="custom-text-table-tittle">Nombre</th>
            <th class="custom-text-table-tittle">Entidad</th>
            <th class="custom-text-table-tittle">C&oacutedigo postal</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $id_tbl_centro_trabajo_hraes = base64_encode($row[0]);
        $data .=
            '<tbody style="background-color: white;">
                        <tr>
                            <td class="text-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sucess dropdown-toggle table-button-style btn btn-light boton-con-imagen_table" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../../../assets/icons/editar.png" alt="Imagen del botón"></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row[0] . ')"class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>   
                                <form action="../Plazas/index.php" method="POST">
                                        <input type="hidden" id="postId" name="id_tbl_centro_trabajo_hraes" value="' . $row[0] . '" />
                                        <button id="centro_trabajo_plazas" class="dropdown-item btn btn-light boton-con-imagen_table text-center"><img src="../../../../assets/icons/plazas/plaza.png" alt="Imagen del botón"> Plazas asignadas al centro de trabajo</button>
                                    </form>
                                <hr>
                                <button onclick="eliminarEntity(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button>
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
                                ' . $row[3] . '
                            </td>
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;


