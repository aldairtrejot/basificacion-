<?php

class ModelRolM
{
    public function listarByAll()
    {
        $listado = "SELECT id_rol, nombre, descripcion
                    FROM rol
                    ORDER BY nombre ASC
                    LIMIT 6;";
        return $listado;
    }

    public function listarByLike($busqueda)
    {
        $listado = "SELECT id_rol, nombre, descripcion
                    FROM rol
                    WHERE TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(descripcion))) LIKE '%$busqueda%'
                    ORDER BY nombre ASC
                    LIMIT 6;";



        return $listado;
    }
}
