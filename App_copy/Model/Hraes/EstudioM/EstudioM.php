<?php

class ModelEstudioM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT ctrl_estudios_hraes.id_ctrl_estudios_hraes,
                                    cat_nivel_estudios.nivel_estudios
                            FROM ctrl_estudios_hraes
                            INNER JOIN cat_nivel_estudios
                            ON ctrl_estudios_hraes.id_cat_nivel_estudios = 
                                cat_nivel_estudios.id_cat_nivel_estudios
                            WHERE ctrl_estudios_hraes.id_tbl_empleados_hraes = $id_object
                            ORDER BY ctrl_estudios_hraes.id_ctrl_estudios_hraes DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByBusqueda($id_object, $busqueda, $paginator)
    {
        $listado = pg_query("SELECT ctrl_estudios_hraes.id_ctrl_estudios_hraes,
                                    cat_nivel_estudios.nivel_estudios
                            FROM ctrl_estudios_hraes
                            INNER JOIN cat_nivel_estudios
                            ON ctrl_estudios_hraes.id_cat_nivel_estudios = 
                                cat_nivel_estudios.id_cat_nivel_estudios
                            WHERE ctrl_estudios_hraes.id_tbl_empleados_hraes = $id_object
                            AND TRIM(UPPER(UNACCENT(cat_nivel_estudios.nivel_estudios)))
                                LIKE '%$busqueda%'
                            ORDER BY ctrl_estudios_hraes.id_ctrl_estudios_hraes DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByIdEdit($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_estudios_hraes, id_tbl_empleados_hraes,
                                    id_cat_nivel_estudios
                             FROM ctrl_estudios_hraes
                             WHERE id_ctrl_estudios_hraes = $id_object");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_estudios_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_estudios_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_estudios_hraes', $condicion);
        return $pgs_delete;
    }
}
