<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$listado = new modelPlazasHraes();

$id_tbl_plazas_empleados_hraes = $_POST['id_tbl_control_plazas_hraes'];
$query = $listado->listarHistoria($id_tbl_plazas_empleados_hraes); //INICIO DE LA TABLA CON LA INFORMACION

$data =
    '<table class="table table-striped" id="tabla_historia_plaza_empleado" style="width:100%">
    <thead>
        <tr style="background-color:#BC955C;">
            <th style="color: white;font-size: 14px">Rfc de empleado</th>
            <th style="color: white;font-size: 14px">Movimiento</th>
            <th style="color: white;font-size: 14px">Fecha inicio</th>
            <th style="color: white;font-size: 14px">Fecha termino</th>
            <th style="color: white;font-size: 14px">Fecha movimiento</th>
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
                            <td style="font-size: 14px">
                                ' . $row[0] . '
                            </td>
                            <td style="font-size: 14px">
                                ' . $row[1] . '
                            </td>
                            <td style="font-size: 14px">
                                ' . $row[2] . '
                            </td>
                            <td style="font-size: 14px">
                                ' . $row[3] . '
                            </td>
                            <td style="font-size: 14px">
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


