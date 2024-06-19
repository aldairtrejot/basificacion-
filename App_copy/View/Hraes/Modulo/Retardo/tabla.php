<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/RetardoM/RetardoM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];

$modelRetardoM = new ModelRetardoM();
$listado = $modelRetardoM ->listarById($id_tbl_empleados_hraes,$paginador);

if(isset($_POST['busqueda'])){
    $listado = $modelRetardoM->listarByBusqueda($id_tbl_empleados_hraes,$_POST['busqueda'],$paginador);
}

function concatFecha($fecha1, $fecha2){
    $fecha = "";
    if (isset($fecha1)){
        $fecha = $fecha1 . ':' .$fecha2;
    }
    return $fecha;
}

$data =
    '<table class="table table-sm" id="tabla_retardo" style="width:100%">
    <thead>
        <tr>
            <th style="background:#e5e7e8" class="text-center">Acciones</th>
            <th style="background:#e5e7e8">Fecha</th>
            <th style="background:#e5e7e8">Hora entrada</th>
            <th style="background:#e5e7e8">Hora salida</th>
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
                                <button onclick="agregarEditarRetardo(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>
                                <button onclick="eliminarRetardo(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/eliminar.png" alt="Imagen del botón"> Eliminar</button> 
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . concatFecha($row[2],$row[3]) . '
                            </td>
                            <td>
                                ' . concatFecha($row[4],$row[5]) . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
