<?php

class modelUsuario{
    public function listarUsuarioAll(){
        $listado = "SELECT id_usuarios_pk, nombre, edad, fecha_nacimiento
                    FROM usuarios
                    ORDER BY id_usuarios_pk DESC
                    LIMIT 25";
        return $listado;
    }

    public function listarUsuarioByLike($busqueda){
        $listado = "SELECT id_usuarios_pk, nombre, edad, fecha_nacimiento
                    FROM usuarios
                    WHERE TRIM(UPPER(nombre)) LIKE '%$busqueda%'
                    OR CAST(edad AS TEXT) LIKE '%$busqueda%'
                    OR fecha_nacimiento::TEXT LIKE '%$busqueda%'
                    ORDER BY id_usuarios_pk DESC
                    LIMIT 25";
        return $listado;
    }

    public function listarUsuarioByIdEdit($id_usuarios_pk){
        $listado = "SELECT id_usuarios_pk, nombre, edad, fecha_nacimiento
                    FROM usuarios
                    WHERE id_usuarios_pk = $id_usuarios_pk
                    ORDER BY id_usuarios_pk DESC
                    LIMIT 25";
        return $listado;
    }

    public function listarUsuarioIsNull(){
        return $array = [
            'id_usuarios_pk' => null,
            'nombre' => null,
            'edad' => null,
            'fecha_nacimiento' => null
        ];
    }
}