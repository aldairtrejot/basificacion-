<?php

class modelReclutamiento{
    public function listarByAll(){
        $listado = "SELECT id_tbl_empleados_rec, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, nss
                    FROM tbl_empleados_rec
                    ORDER BY id_tbl_empleados_rec DESC
                    LIMIT 6";
        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = "SELECT id_tbl_empleados_rec, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, nss
                    FROM tbl_empleados_rec
                    WHERE id_tbl_empleados_rec = $id_object
                    ORDER BY id_tbl_empleados_rec DESC
                    LIMIT 6";
        return $listado;
    }

    public function listarByLike($busqueda){
        $listado = "SELECT id_tbl_empleados_rec, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, nss
                    FROM tbl_empleados_rec
                    WHERE TRIM(UPPER(UNACCENT(rfc))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(curp))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(primer_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(segundo_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nss))) LIKE '%$busqueda%'
                    ORDER BY tbl_empleados_rec DESC
                    LIMIT 10";
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_empleados_rec' => null,
            'rfc' => null,
            'curp' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'nss' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'tbl_empleados_rec', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'tbl_empleados_rec', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'tbl_empleados_rec',$condicion);
        return $pgs_delete;
    }

}
