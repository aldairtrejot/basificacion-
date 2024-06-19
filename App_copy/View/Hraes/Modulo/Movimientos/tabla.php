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
    '<table class="table table-sm" id="tabla_movimientos" style="width:100%">
    <thead>
        <tr>
            <th style="background:#e5e7e8" class="text-center">Acciones</th>
            <th style="background:#e5e7e8">N&uacutem. Plaza</th>
            <!--
            <th style="background:#e5e7e8">Movimiento general</th>
            -->
            <th style="background:#e5e7e8">Movimiento especifico</th>
            <th style="background:#e5e7e8">Fecha movimiento</th>
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
                                <button onclick="agregarEditarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>
                                <button onclick="eliminarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button>
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
