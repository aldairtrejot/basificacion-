<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$listado = new modelPlazasHraes();
//$query = $listado->listarByAll(); //INICIO DE LA TABLA CON LA INFORMACION
$busqueda = $_POST['busqueda'];
$paginador = $_POST['paginador'];
$id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];

if ($id_tbl_centro_trabajo_hraes != null){///LISTAR CON ID DE CENTRO DE TRABAJO
    if($busqueda != ''){ ///LISTAR CON BUSQUEDA
        $query = $listado->listarByLike($id_tbl_centro_trabajo_hraes,$busqueda,$paginador);
    } else{ ///LISTAR SIN BUSQUEDA
        $query = $listado->listarByAll($id_tbl_centro_trabajo_hraes,$paginador);
    }
} else { ///LISTAR SIN ID DE CENTRO DE TRABAJO
    if($busqueda != ''){ ///LISTAR CON BUSQUEDA
        $query = $listado->listarByLike($id_tbl_centro_trabajo_hraes,$busqueda,$paginador);
    } else{ ///LISTAR SIN BUSQUEDA
        $query = $listado->listarByAll($id_tbl_centro_trabajo_hraes,$paginador);
    }
}

$data =
    '<table class="table table-striped table-small-rows" id="tabla_plazas" style="width:100%">
    <thead>
        <tr class="table-tittle-color">
            <th class="custom-text-table-tittle col-md-1 text-center">Acciones</th>
            <th class="custom-text-table-tittle">N&uacutem. de plaza</th>
            <th class="custom-text-table-tittle">Tipo de plaza</th>
            <th class="custom-text-table-tittle">Tipo de contrataci&oacuten</th>
            <th class="custom-text-table-tittle">Unidad responsable</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $data .=
            '<tbody style="background-color: white;">
                        <tr>
                            <td class="text-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sucess dropdown-toggle table-button-style btn btn-light boton-con-imagen_table" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../../../assets/icons/editar.png" alt="Imagen del botón"></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/editar.png" alt="Imagen del botón"> Modificar</button>
                                <hr>
                                <button onclick="detallesEntity(' . $row[0] . ')" class="dropdown-item btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/plazas/detalles.png" alt="Imagen del botón"> Detalles</button> 
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
} else {
    $data .= '<h6>Sin resultados</h6>';
}
echo $data;


