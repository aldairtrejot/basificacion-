<?php

class ModelRetardoM
{
    function listarById($id_object,$paginator)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                             FROM ctrl_retardo_hraes
                             WHERE id_tbl_empleados_hraes = $id_object
                             ORDER BY id_ctrl_retardo_hraes DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                            FROM ctrl_retardo_hraes
                            WHERE id_ctrl_retardo_hraes = $id_object
                            ORDER BY id_ctrl_retardo_hraes DESC
                            LIMIT 5;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_retardo_hraes' => null,
            'fecha' => null,
            'hora_entrada' => null,
            'minuto_entrada' => null,
            'hora_salida' => null,
            'minuto_salida' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }

    function listarByBusqueda($id_object, $busqueda,$paginator)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                             FROM ctrl_retardo_hraes
                             WHERE id_tbl_empleados_hraes = $id_object
                             AND fecha::TEXT LIKE '%$busqueda%'
                             ORDER BY id_ctrl_retardo_hraes DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_retardo_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_retardo_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_retardo_hraes', $condicion);
        return $pgs_delete;
    }
}
