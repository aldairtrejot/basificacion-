<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/MovimientosM/MovimientosM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];
$modelMovimientosM = new ModelMovimientosM();
$listado = $modelMovimientosM -> listarByIdEmpleado($id_tbl_empleados_hraes,$paginador);

if(isset($_POST['busqueda'])){
    $listado = $modelMovimientosM->listarByBusqueda($id_tbl_empleados_hraes,$paginador,$_POST['busqueda']);
}

$data =
    '<table class="table table-bordered" id="tabla_movimientos" style="width:100%">
    <thead>
        <tr>
            <th>Acciones</th>
            <th>N&uacutem. Plaza</th>
            <!--
            <th>Movimiento general</th>
            -->
            <th>Movimiento especifico</th>
            <th>Fecha movimiento</th>
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
                            <button onclick="agregarEditarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit icon-edit-table"></i> Modificar</button>
                            <button onclick="eliminarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt icon-delete-table"></i> Eliminar</button>  
                        </div>
                      </div>
                                </td>
                            <td>
                                ' . $row[8] . '
                            </td>
                            <!--
                            <td>
                                ' . $row[7] . '
                            </td>
                            -->
                            <td>
                                ' . $row[6] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
