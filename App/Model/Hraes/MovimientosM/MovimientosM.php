<?php

class ModelMovimientosM
{
    public function listarByIdEmpleado($idEmpleado,$paginator)
    {
        $listado = pg_query("SELECT tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes, 
                                    tbl_plazas_empleados_hraes.fecha_inicio, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_movimientos, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento, 
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes,
                                    CONCAT(tbl_movimientos.codigo,' - ',tbl_movimientos.nombre_movimiento),
                                    tbl_movimientos.tipo_movimiento,
                                    tbl_control_plazas_hraes.num_plaza
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN tbl_control_plazas_hraes
                            ON tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
                                tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
                            WHERE tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 3 OFFSET $paginator;");

        return $listado;
    }
    
    public function listarByBusqueda($idEmpleado,$paginator,$busqueda){
        $listado = pg_query("SELECT tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes, 
                                    tbl_plazas_empleados_hraes.fecha_inicio, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_movimientos, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento, 
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes,
                                    CONCAT(tbl_movimientos.codigo,' - ',tbl_movimientos.nombre_movimiento),
                                    tbl_movimientos.tipo_movimiento,
                                    tbl_control_plazas_hraes.num_plaza
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN tbl_control_plazas_hraes
                            ON tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
                                tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
                            WHERE tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            AND (TRIM(UPPER(UNACCENT(tbl_plazas_empleados_hraes.fecha_movimiento::TEXT))) 
                                    LIKE '%$busqueda%' OR
                                    TRIM(UPPER(UNACCENT(tbl_movimientos.nombre_movimiento::TEXT)))
                                    LIKE '%$busqueda%' OR
                                tbl_control_plazas_hraes.num_plaza LIKE '%$busqueda%'
                            )
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    public function listarByEdit($idMovimiento){
        $listado = pg_query("SELECT id_tbl_plazas_empleados_hraes,fecha_inicio,
                                    fecha_termino,id_tbl_movimientos,fecha_movimiento,
                                    id_tbl_control_plazas_hraes,id_tbl_empleados_hraes,
                                    observaciones, motivo_estatus,id_cat_caracter_nom_hraes
                             FROM tbl_plazas_empleados_hraes
                             WHERE id_tbl_plazas_empleados_hraes = $idMovimiento;");
        return $listado;
    }

    public function listarByNull()
    {
        return $array = [
            'id_tbl_plazas_empleados_hraes' => null,
            'fecha_inicio' => null,
            'fecha_termino' => null,
            'id_tbl_movimientos' => null,
            'fecha_movimiento' => null,
            'id_tbl_control_plazas_hraes' => null,
            'id_tbl_empleados_hraes' => null,
            'id_cat_caracter_nom_hraes' => null,
            'motivo_estatus' => null,
            'observaciones' => null,
        ];
    }




    public function listarCountPlaza($id){
        $listado = pg_query("SELECT COUNT(tbl_plazas_empleados_hraes)
                             FROM tbl_plazas_empleados_hraes
                             WHERE id_tbl_control_plazas_hraes = $id");
        return $listado;
    }




    public function listadoByIdPlaza($idEmpleado)
    {
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes
                             FROM tbl_plazas_empleados_hraes
                             WHERE id_tbl_empleados_hraes = $idEmpleado
                             ORDER BY fecha_movimiento DESC
                             LIMIT 1");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion, $name)
    {
        $pg_update = pg_update($conexion, $name, $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos, $name)
    {
        $pg_add = pg_insert($conexion, $name, $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion, $name)
    {
        $pgs_delete = pg_delete($conexion, $name, $condicion);
        return $pgs_delete;
    }

    public function ultimoMovimientoByVal($idPlaza){
        $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                                ON tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                    tbl_movimientos.id_tbl_movimientos
                            WHERE id_tbl_empleados_hraes = (
                                SELECT id_tbl_empleados_hraes
                                FROM tbl_plazas_empleados_hraes
                                WHERE id_tbl_control_plazas_hraes = $idPlaza 
                                ORDER BY id_tbl_plazas_empleados_hraes DESC
                                LIMIT 1)
                            ORDER BY id_tbl_plazas_empleados_hraes DESC
                            LIMIT 1");
        return $listado;
    }

    public function countPlazasById($idPlaza){
        $listado = pg_query("SELECT COUNT (id_tbl_plazas_empleados_hraes)
                             FROM tbl_plazas_empleados_hraes
                             WHERE id_tbl_control_plazas_hraes = $idPlaza;");
        return $listado;
    }


        ///LA FUNCION PERMITE SABER SI EXISTE INFORMACION EN LA BASE DEL EMPLEADO
        public function countUltimoMovimiento($idEmpleado)
        {
            $listado = pg_query("SELECT COUNT(id_tbl_plazas_empleados_hraes)
                                 FROM tbl_plazas_empleados_hraes 
                                 WHERE id_tbl_empleados_hraes = $idEmpleado");
            return $listado;
        }

        ///LA FUNCION TRAE EL ULTIMO MOVIMIENTO (ALTA, BAJA, MOVIMIENTO DEL EMPLEADO)
        public function listadoUltimoMovimiento($idEmpleado)
        {
            $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento,
                                        tbl_plazas_empleados_hraes.fecha_movimiento
                                 FROM tbl_plazas_empleados_hraes 
                                 INNER JOIN tbl_movimientos
                                 ON tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                    tbl_movimientos.id_tbl_movimientos
                                 WHERE tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                                 GROUP BY tbl_plazas_empleados_hraes.fecha_movimiento,
                                        tbl_movimientos.id_tipo_movimiento
                                 ORDER BY tbl_plazas_empleados_hraes.fecha_movimiento DESC
                                 LIMIT 1;");
            return $listado;
        }

        public function idPlazaMovimiento($idEmpleado){
            $listado = pg_query("SELECT id_tbl_control_plazas_hraes
                                 FROM tbl_plazas_empleados_hraes
                                 WHERE id_tbl_empleados_hraes = $idEmpleado
                                 ORDER BY id_tbl_plazas_empleados_hraes DESC
                                 LIMIT 1;");
            return $listado;
        }
}
