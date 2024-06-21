<?php

class ModelRetardoM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT 
                                id_ctrl_asistencia_bas,
                                fecha,
                                TO_CHAR(hora, 'HH24:MI'),
                                cat_asistencia_bas.nombre
                            FROM ctrl_asistencia_bas
							INNER JOIN cat_asistencia_bas
							ON ctrl_asistencia_bas.id_cat_asistencia_bas =
								cat_asistencia_bas.id_cat_asistencia_bas
                            WHERE id_tbl_empleados_hraes = $id_object
                            ORDER BY id_ctrl_asistencia_bas DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM ctrl_asistencia_bas
                            WHERE id_ctrl_asistencia_bas = $id_object;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_retardo_hraes' => null,
            'fecha' => null,
            'hora' => null,
            'minuto_entrada' => null,
            'hora_salida' => null,
            'minuto_salida' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }

    function listarByBusqueda($id_object, $busqueda, $paginator)
    {
        $listado = pg_query("SELECT 
                                id_ctrl_asistencia_bas,
                                fecha,
                                TO_CHAR(hora, 'HH24:MI'),
                                cat_asistencia_bas.nombre
                            FROM ctrl_asistencia_bas
							INNER JOIN cat_asistencia_bas
							ON ctrl_asistencia_bas.id_cat_asistencia_bas =
								cat_asistencia_bas.id_cat_asistencia_bas
                            WHERE id_tbl_empleados_hraes = $id_object
                            AND ( fecha::date::TEXT LIKE '%$busqueda%'
                                OR ((TO_CHAR(hora, 'HH24:MI')))::TEXT
                                    LIKE '%$busqueda%'
                                OR UPPER(cat_asistencia_bas.nombre) LIKE '%$busqueda%'
                                )
                            ORDER BY id_ctrl_asistencia_bas DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_asistencia_bas', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_asistencia_bas', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_asistencia_bas', $condicion);
        return $pgs_delete;
    }

    function saveAsistencia($observaciones,$id_tbl_empleados_hraes,$id_cat_asistencia_bas,$id_cat_estatus_bas){
        $save = pg_query("INSERT INTO ctrl_asistencia_bas (fecha, hora, observaciones, id_tbl_empleados_hraes, id_cat_asistencia_bas, id_cat_estatus_bas)
                            VALUES (CURRENT_DATE, CURRENT_TIME, '$observaciones', $id_tbl_empleados_hraes, $id_cat_asistencia_bas,$id_cat_estatus_bas);");
    }
}
