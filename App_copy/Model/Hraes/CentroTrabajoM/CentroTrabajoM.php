<?php

class modelCentroTrabajoHraes
{
    public function listarByAll($paginator)
    {
        $listado = "SELECT tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                            tbl_centro_trabajo_hraes.clave_centro_trabajo,
                            tbl_centro_trabajo_hraes.nombre,
                            cat_entidad.entidad, tbl_centro_trabajo_hraes.codigo_postal
                    FROM tbl_centro_trabajo_hraes
                    INNER JOIN cat_entidad
                    ON tbl_centro_trabajo_hraes.id_cat_entidad = 
                        cat_entidad.id_cat_entidad
                    ORDER BY tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes DESC
                    LIMIT 10 OFFSET $paginator;";

        return $listado;
    }

    public function listarByLike($busqueda,$paginator)
    {
        $listado = "SELECT tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                            tbl_centro_trabajo_hraes.clave_centro_trabajo,
                            tbl_centro_trabajo_hraes.nombre,
                            cat_entidad.entidad, tbl_centro_trabajo_hraes.codigo_postal
                    FROM tbl_centro_trabajo_hraes
                    INNER JOIN cat_entidad
                    ON tbl_centro_trabajo_hraes.id_cat_entidad = 
                        cat_entidad.id_cat_entidad
                    WHERE TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.clave_centro_trabajo))) 
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.nombre)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_entidad.entidad)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.codigo_postal)))
                          LIKE '%$busqueda%'
                    ORDER BY tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes DESC
                    LIMIT 10 OFFSET $paginator;";

        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT id_tbl_centro_trabajo_hraes, clave_centro_trabajo, nombre,
                                    colonia, codigo_postal, num_exterior, num_interior, latitud, longitud,
                                    id_cat_region, id_estatus_centro, id_cat_entidad, pais
                            FROM tbl_centro_trabajo_hraes
                            WHERE id_tbl_centro_trabajo_hraes = $id_object
                            ORDER BY id_tbl_centro_trabajo_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion,$tablaCentroTrabajo){
        $pg_update = pg_update($conexion, $tablaCentroTrabajo, $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos,$tablaCentroTrabajo){
        $pg_add = pg_insert($conexion, $tablaCentroTrabajo, $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion,$tablaCentroTrabajo){
        $pgs_delete = pg_delete($conexion,$tablaCentroTrabajo,$condicion);
        return $pgs_delete;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_centro_trabajo_hraes' => null,
            'nombre' => null,
            'clave_centro_trabajo' => null,
            'colonia' => null,
            'codigo_postal' => null,
            'num_exterior' => null,
            'num_interior' => null,
            'latitud' => null,
            'longitud' => null,
            'id_cat_region' => null,
            'id_estatus_centro' => null,
            'id_cat_entidad' => null,
            'pais' => null
        ];
    }
}
