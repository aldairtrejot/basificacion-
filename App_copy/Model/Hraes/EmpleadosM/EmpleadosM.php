<?php

class modelEmpleadosHraes{

    public function validarCurp($value,$id_object){
        $result ="";
        if($id_object != ''){
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE curp = '$value' " . $result);
        return $listado;
    }

    public function validarRfc($value,$id_object){
        $result ="";
        if($id_object != ''){
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE rfc = '$value' " . $result);
        return $listado;
    }

    public function validarNoEmpleado($value,$id_object){
        $result ="";
        if($id_object != ''){
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE num_empleado = '$value' " . $result);
        return $listado;
    }

    public function listarByAll($paginador){
        $listado = "SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, num_empleado
                    FROM tbl_empleados_hraes
                    ORDER BY id_tbl_empleados_hraes DESC
                    LIMIT 6 OFFSET $paginador;";

        return $listado;
    }

    public function listarByLike($busqueda,$paginador){
        $listado = "SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                           segundo_apellido,num_empleado
                    FROM tbl_empleados_hraes
                    WHERE TRIM(UPPER(UNACCENT(rfc))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(curp))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(primer_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(segundo_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(CAST(num_empleado AS TEXT)))) LIKE '%$busqueda%'
                    ORDER BY id_tbl_empleados_hraes DESC
                    LIMIT 6 OFFSET $paginador;";
        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                                    segundo_apellido, nss,num_empleado,pais_nacimiento,
                                    id_cat_estado_civil,id_cat_genero_hraes
                            FROM tbl_empleados_hraes
                            WHERE id_tbl_empleados_hraes = $id_object
                            ORDER BY id_tbl_empleados_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_empleados_hraes' => null,
            'rfc' => null,
            'curp' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'nss' => null,
            'num_empleado' => null,
            'pais_nacimiento' => null,
            'id_cat_estado_civil' => null,
            'id_cat_genero' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'tbl_empleados_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'tbl_empleados_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'tbl_empleados_hraes',$condicion);
        return $pgs_delete;
    }
}
