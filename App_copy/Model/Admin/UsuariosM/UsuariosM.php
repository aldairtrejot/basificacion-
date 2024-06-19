<?php

class UsuariosM
{
    ///INICIALIZACION DE FUNCIONES

    ///LA FUNCION LISTA LOS USUARIOS DEL SISTEMA
    public function listarByAll($paginator)
    {
        $listado = "SELECT users.id_user, users.nick, users.nombre, users.status,
                            rol.nombre
                    FROM users
                    INNER JOIN rol
                    ON users.id_rol = rol.id_rol
                    ORDER BY users.id_user DESC
                    LIMIT 5 OFFSET $paginator;";

        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT id_user, nick, nombre, password, status, token, id_rol
                             FROM users
                             WHERE id_user = $id_object");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'users', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'users', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'users',$condicion);
        return $pgs_delete;
    }

    public function listarByNull(){
        return $array = [
            'id_user' => null,
            'nick' => null,
            'nombre' => null,
            'password' => null,
            'status' => null,
            'token' => null,
            'id_rol' => null
        ];
    }

    public function listarByLike($busqueda,$paginator)
    {
        $listado = "SELECT users.id_user, users.nick, users.nombre, users.status,
                            rol.nombre
                    FROM users
                    INNER JOIN rol
                    ON users.id_rol = rol.id_rol
                    WHERE TRIM(UPPER(UNACCENT(users.nick)))
                        LIKE '%$busqueda%' 
                    OR TRIM(UPPER(UNACCENT(users.nombre))) 
                        LIKE '%$busqueda%' 
                    OR TRIM(UPPER(UNACCENT(rol.nombre))) 
                        LIKE '%$busqueda%' 
                    ORDER BY users.id_user DESC
                    LIMIT 5 OFFSET $paginator;";
        return $listado;
    }
}
