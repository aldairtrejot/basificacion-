<?php

class modelPlazasHraes
{
    public function listarByAll($id_tbl_centro_trabajo_hraes, $paginator)
    {
        $result = "
            ORDER BY id_tbl_control_plazas_hraes DESC
            LIMIT 6 OFFSET $paginator;";

        if ($id_tbl_centro_trabajo_hraes != null) {
            $result = "
                WHERE tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = $id_tbl_centro_trabajo_hraes
                ORDER BY tbl_control_plazas_hraes.id_tbl_control_plazas_hraes DESC
                LIMIT 6 OFFSET $paginator;";
        }

        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                            tbl_control_plazas_hraes.num_plaza, 
                            cat_tipo_plazas.tipo_plaza,
                            CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, ' ',
                                cat_subtipo_contratacion_hraes.subtipo),
                            cat_unidad_responsable.nombre,
                            cat_puesto_hraes.nombre_posicion
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_tipo_plazas
                        ON tbl_control_plazas_hraes.id_cat_tipo_plazas = cat_tipo_plazas.id_cat_tipo_plazas
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                            cat_unidad_responsable.id_cat_unidad_responsable
                    INNER JOIN cat_tipo_subtipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_subtipo_contratacion_hraes = 
                        cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_contratacion_hraes =
                            cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_puesto_hraes
                        ON tbl_control_plazas_hraes.id_cat_puesto_hraes =
                            cat_puesto_hraes.id_cat_puesto_hraes
                    INNER JOIN cat_subtipo_contratacion_hraes
                        ON 	cat_tipo_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes =
                            cat_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes " . $result;
        return $listado;
    }

    public function listarByLike($id_tbl_centro_trabajo_hraes, $busqueda, $paginator)
    {
        $result = "AND (TRIM(UPPER(UNACCENT(tbl_control_plazas_hraes.num_plaza))) 
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_tipo_plazas.tipo_plaza)))
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, ' ',
                                cat_subtipo_contratacion_hraes.subtipo))))
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_unidad_responsable.nombre)))
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_puesto_hraes.nombre_posicion)))
                            LIKE '%$busqueda%')
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 6 OFFSET $paginator;";
        $condition = "";
        if ($id_tbl_centro_trabajo_hraes != null) {
            $condition = "WHERE tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = 
                          $id_tbl_centro_trabajo_hraes ";
        }
        $condition = $condition . $result;

        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                            tbl_control_plazas_hraes.num_plaza, 
                            cat_tipo_plazas.tipo_plaza,
                            CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, ' ',
                                cat_subtipo_contratacion_hraes.subtipo),
                            cat_unidad_responsable.nombre,
                            cat_puesto_hraes.nombre_posicion
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_tipo_plazas
                        ON tbl_control_plazas_hraes.id_cat_tipo_plazas = cat_tipo_plazas.id_cat_tipo_plazas
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                            cat_unidad_responsable.id_cat_unidad_responsable
                    INNER JOIN cat_tipo_subtipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_subtipo_contratacion_hraes = 
                        cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_contratacion_hraes =
                            cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_puesto_hraes
                        ON tbl_control_plazas_hraes.id_cat_puesto_hraes =
                            cat_puesto_hraes.id_cat_puesto_hraes
                    INNER JOIN cat_subtipo_contratacion_hraes
                        ON 	cat_tipo_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes =
                            cat_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes " . $condition;
        return $listado;
    }

    function detallesPlazas($id_object)
    {
        $listado = pg_query("SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                                    tbl_control_plazas_hraes.num_plaza, 
                                    cat_tipo_plazas.tipo_plaza,
                                    cat_unidad_responsable.nombre,
                                    tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                                    tbl_centro_trabajo_hraes.clave_centro_trabajo,
                                    tbl_centro_trabajo_hraes.nombre,
                                    cat_entidad.entidad, 
                                    tbl_centro_trabajo_hraes.codigo_postal
                            FROM tbl_control_plazas_hraes
                            INNER JOIN cat_tipo_plazas
                            ON tbl_control_plazas_hraes.id_cat_tipo_plazas = cat_tipo_plazas.id_cat_tipo_plazas
                            INNER JOIN cat_unidad_responsable
                            ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                            cat_unidad_responsable.id_cat_unidad_responsable
                            INNER JOIN tbl_centro_trabajo_hraes
                            ON tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = 
                            tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes
                            INNER JOIN cat_entidad
                            ON tbl_centro_trabajo_hraes.id_cat_entidad = cat_entidad.id_cat_entidad
                            WHERE tbl_control_plazas_hraes.id_tbl_control_plazas_hraes = $id_object");
        return $listado;
    }

    function listarHistoria($id_object)
    {
        $listado = "SELECT tbl_empleados_hraes.rfc,
                                    tbl_movimientos.nombre_movimiento,
                                    tbl_plazas_empleados_hraes.fecha_inicio,	
                                    tbl_plazas_empleados_hraes.fecha_termino,
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN tbl_empleados_hraes
                            ON tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
                                tbl_empleados_hraes.id_tbl_empleados_hraes
                            WHERE tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes = $id_object
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 3;";
        return $listado;
    }

    function listarByIdEdit($id_object)
    {
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes, num_plaza,
                                    id_cat_tipo_plazas,id_cat_tipo_subtipo_contratacion_hraes,
                                    id_cat_unidad_responsable,
                                    id_tbl_centro_trabajo_hraes,id_cat_puesto_hraes,
                                    id_cat_zonas_tabuladores_hraes,id_cat_niveles_hraes,
                                    id_tbl_zonas_pago_hraes,fecha_ingreso_inst,fecha_inicio_movimiento,
                                    fecha_termino_movimiento,fecha_modificacion,
                                    id_cat_situacion_plaza_hraes
                            FROM tbl_control_plazas_hraes
                            WHERE id_tbl_control_plazas_hraes = $id_object");
        return $listado;
    }

    public function listarCountByNum($numPlaza)
    {
        $listado = pg_query("SELECT COUNT (id_tbl_control_plazas_hraes)
                             FROM tbl_control_plazas_hraes
                             WHERE num_plaza = '$numPlaza';");
        return $listado;
    }

    public function listarNumPlazaUResp($numPlaza)
    {
        $listado = pg_query("SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                                    tbl_control_plazas_hraes.id_cat_tipo_plazas,
                                    cat_tipo_plazas.tipo_plaza,
                                    cat_unidad_responsable.nombre
                            FROM tbl_control_plazas_hraes
                            INNER JOIN cat_tipo_plazas
                            ON tbl_control_plazas_hraes.id_cat_tipo_plazas = 
                                cat_tipo_plazas.id_cat_tipo_plazas
                            INNER JOIN cat_unidad_responsable
                            ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                                cat_unidad_responsable.id_cat_unidad_responsable
                            WHERE tbl_control_plazas_hraes.num_plaza = '$numPlaza';");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_tbl_control_plazas_hraes' => null,
            'num_plaza' => null,
            'id_cat_tipo_plazas' => null,
            'id_cat_tipo_subtipo_contratacion_hraes' => null,
            'id_cat_unidad_responsable' => null,
            'id_tbl_centro_trabajo_hraes' => null,
            'id_cat_puesto_hraes' => null,
            'id_cat_zonas_tabuladores_hraes' => null,
            'id_cat_niveles_hraes' => null,
            'id_tbl_zonas_pago_hraes' => null,
            'fecha_ingreso_inst' => null,
            'fecha_inicio_movimiento' => null,
            'fecha_termino_movimiento' => null,
            'fecha_modificacion' => null,
            'id_cat_situacion_plaza_hraes' => null
        ];
    }

    public function listarByEditMovimiento($id)
    {
        $listado = pg_query("SELECT tbl_control_plazas_hraes.num_plaza,
                                    cat_tipo_plazas.tipo_plaza,
                                    cat_unidad_responsable.nombre
                            FROM tbl_control_plazas_hraes
                            INNER JOIN cat_tipo_plazas
                            ON tbl_control_plazas_hraes.id_cat_tipo_plazas =
                                cat_tipo_plazas.id_cat_tipo_plazas
                            INNER JOIN cat_unidad_responsable
                            ON tbl_control_plazas_hraes.id_cat_unidad_responsable =
                                cat_unidad_responsable.id_cat_unidad_responsable
                            WHERE tbl_control_plazas_hraes.id_tbl_control_plazas_hraes = $id");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'tbl_control_plazas_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'tbl_control_plazas_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'tbl_control_plazas_hraes', $condicion);
        return $pgs_delete;
    }

    public function ultimoMovimientoPlaza($id)
    {
        $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes,
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                tbl_movimientos.id_tbl_movimientos
                            WHERE tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes = $id
                            ORDER BY tbl_plazas_empleados_hraes.fecha_movimiento DESC
                            LIMIT 1;");
        return $listado;
    }

    public function allCountPlazas()
    {
        $listado = pg_query("SELECT COUNT (id_tbl_control_plazas_hraes)
                             FROM tbl_control_plazas_hraes;");
        return $listado;
    }

    public function tipoPlazaAll($idCatPlaza)
    {
        $listado = pg_query("SELECT COUNT (id_tbl_control_plazas_hraes)
                             FROM tbl_control_plazas_hraes
                             WHERE id_cat_tipo_plazas = $idCatPlaza;");
        return $listado;
    }

    public function claveCentroTrabajo($idPlaza)
    {
        $listado = pg_query("SELECT tbl_centro_trabajo_hraes.clave_centro_trabajo
                             FROM tbl_control_plazas_hraes
                             INNER JOIN tbl_centro_trabajo_hraes
                             ON  tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes =
                                 tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes
                             WHERE tbl_control_plazas_hraes.id_tbl_control_plazas_hraes = $idPlaza;");
        return $listado;
    }

    public function plazaVacante()
    {
        ////EL NUMERO 5 REPRESENTA LAS PLAZAS
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes,num_plaza
                             FROM tbl_control_plazas_hraes
                             WHERE id_cat_tipo_plazas = 5
                             ORDER BY num_plaza ASC;");
        return $listado;
    }

    public function plazaVacanteEdit($idPlaza)
    {
        ////EL NUMERO 5 REPRESENTA LAS PLAZAS
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes,num_plaza
                             FROM tbl_control_plazas_hraes
                             WHERE id_tbl_control_plazas_hraes = $idPlaza");
        return $listado;
    }

    public function infoPlazaCentro($idPlaza)
    {
        $listado = pg_query("SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                                    CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, '-',
                                        cat_subtipo_contratacion_hraes.subtipo),
                                    tbl_centro_trabajo_hraes.clave_centro_trabajo,
                                    tbl_control_plazas_hraes.id_cat_situacion_plaza_hraes
                            FROM tbl_control_plazas_hraes
                            INNER JOIN cat_tipo_subtipo_contratacion_hraes
                            ON tbl_control_plazas_hraes.id_cat_tipo_subtipo_contratacion_hraes =
                                cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes
                            INNER JOIN cat_tipo_contratacion_hraes
                            ON cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_contratacion_hraes =
                                cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                            INNER JOIN cat_subtipo_contratacion_hraes
                            ON	cat_tipo_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes =
                                cat_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes
                            INNER JOIN tbl_centro_trabajo_hraes
                            ON tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes =
                                tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes
                            WHERE tbl_control_plazas_hraes.id_tbl_control_plazas_hraes = $idPlaza;");
        return $listado;
    }

    public function countNumPlaza($numPlaza){
        $listado = pg_query("SELECT COUNT(id_tbl_control_plazas_hraes)
                             FROM tbl_control_plazas_hraes
                             WHERE TRIM(UPPER(num_plaza)) = TRIM(UPPER('$numPlaza'));");
        return $listado;
    }
}
