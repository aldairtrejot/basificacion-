<?php
include '../../../../conexion.php';
include '../../../Model/Admin/RolM/RolM.php';

$listado = new ModelRolM();

$query = $listado->listarByAll();

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda);
}

$data =
    '<table class="table table-striped" id="t-table" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white;">Nombre</th>
            <th style="color: white;">Descripci&oacuten</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $id_tbl_centro_trabajo_hraes = base64_encode($row[0]);
        $data .=
            '<tbody>
                        <tr>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


