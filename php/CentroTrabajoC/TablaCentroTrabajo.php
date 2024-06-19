<?php
include ('Listar.php');
include ("../CatRegionC/listar.php");
include ("../CatEstatusC/listar.php");
include ("../CatEntidadC/listar.php") ;

$idCentroTrabajo = $_POST['idCentroTrabajo'];
if ($idCentroTrabajo == 0){
    $listado = listarCentroTrabajoByIdLike($idCentroTrabajo);
} else {
   // $listado = listarCentroTrabajo();
}

/*
echo                "<thead>
                        <tr style='background-color: #5c5c5c;'>
                        <th style='color: white;'>Acciones</th>
                        <th style='color: white;'>Clave de Centro de Trabajo</th>
                        <th style='color: white;'>Nombre</th>
                        <th style='color: white;'>Pa&iacutes</th>
                        <th style='color: white;'>Entidad</th>
                        <th style='color: white;'>Colonia</th>
                        <th style='color: white;'>C&oacutedigo Postal</th>
                        <th style='color: white;'>N&uacutem. Exterior</th>
                        <th style='color: white;'>N&uacutem. Interior</th>
                        <th style='color: white;'>Latitud</th>
                        <th style='color: white;'>Longitud</th>
                        <th style='color: white;'>Regi&oacuten</th>
                        <th style='color: white;'>Estatus</th>
                        </tr>
                    </thead>";
*/



if ($listado) {
    if (pg_num_rows($listado) > 0) {
        while ($obj = pg_fetch_object($listado)) {
            $data = "msj";

            echo "<tbody>
                        <tr>
                            <td>

                                            <!-- Button more acctions -->
                                            <div class=' btn-group'>
                                                <button type='button' class='btn btn-light' data-toggle='dropdown'
                                                    aria-haspopup='true' aria-expanded='false'
                                                    style='background-color: transparent; border:none; outline:none; color: white;'>
                                                    <i class='fa fa-cog' style='font-size: 1.4rem; color:#cb9f52;'></i>
                                                </button>
                                                <div class='dropdown-menu'"; if(pg_num_rows($listado) == 1){ echo "style='height: 130%; overflow: auto;'";}
                                                    echo "><a class='dropdown-item'
                                                        href='Editar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) . "'>Modificar</a>
                                                    <a class='dropdown-item'
                                                        href='../Plazas/Listar.php?RP=" . base64_encode($obj->id_tbl_centro_trabajo) . "'>Plazas</a>
                                                    <a class='dropdown-item'
                                                        href='../RegistroPatronal/Listar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) . "'>Registro
                                                        Patronal</a>
                                                    <a class='dropdown-item'
                                                        href='../ZonasPago/Listar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) . "'>Zonas
                                                        de Pago</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' data-toggle='modal'
                                                        data-target='#modal-' " . $obj->id_tbl_centro_trabajo . "'>Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                            <div class='modal fade' id='modal-'" . $obj->id_tbl_centro_trabajo . "'
                                                tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>¿Desea continuar?</h5>
                                                            <button type='button' class='close' data-dismiss='modal'
                                                                aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            La acci&oacuten eliminar no se puede rehacer.
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <a class='btn btn-light'
                                                                style='background-color: #cb9f52; border:none; outline:none; color: white;'
                                                                href= '../../php/CentroTrabajoC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_centro_trabajo) . "'>Confirmar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->
                                        </td>
                                        <td>
                                            $obj->clave_centro_trabajo
                                        </td>
                                        <td>
                                            $obj->nombre
                                        </td>
                                        <td>
                                            $obj->pais
                                        </td>
                                        <td>
                                            ".listadoCatEntidadPk($obj->id_cat_entidad)."
                                        </td>
                                        <td>
                                            $obj->colonia
                                        </td>
                                        <td>
                                            $obj->codigo_postal
                                        </td>
                                        <td>
                                            $obj->num_exterior
                                        </td>
                                        <td>
                                            $obj->num_interior
                                        </td>
                                        <td>
                                            $obj->latitud
                                        </td>
                                        <td>
                                            $obj->longitud
                                        </td>
                                        <td>
                                            ".catRegionRegion($obj->id_cat_region)."
                                        </td>
                                        <td>
                                            ".catEstatus($obj->id_estatus_centro)."
                                        </td>

                                    </tr>
                                    </tbody>";
        }
    }
}