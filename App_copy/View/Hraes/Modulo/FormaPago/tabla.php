<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/FormaPagoM/FormaPagoM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];

$modelFormaPagoM = new ModelFormaPagoM();
$listado = $modelFormaPagoM->listarById($id_tbl_empleados_hraes, $paginador);
if (isset($_POST['busqueda'])) {
    $listado = $modelFormaPagoM->listarByBusqueda($id_tbl_empleados_hraes, $_POST['busqueda'], $paginador);
}

$data =
    '<table class="table table-sm" id="tabla_forma_pago" style="width:100%">
    <thead>
        <tr>
            <th style="background:#e5e7e8" class="text-center">Acciones</th>
            <th style="background:#e5e7e8">Clabe</th>
            <th style="background:#e5e7e8">Banco</th>
            <!--
            <th style="background:#e5e7e8">Forma de pago</th>
            -->
            <th style="background:#e5e7e8">Estatus</th>
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
                                <button onclick="agregarEditarFormaPago(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>
                                <button onclick="eliminarFormaPago(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button>   
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                            <!--
                            <td>
                                ' . $row[3] . '
                            </td>
                            --> 
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
