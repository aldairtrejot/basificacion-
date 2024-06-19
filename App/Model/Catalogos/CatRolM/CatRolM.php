<?php
class CatRolM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_rol, nombre, descripcion
                             FROM rol
                             ORDER BY nombre ASC;");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT id_rol, nombre, descripcion
                             FROM rol
                             WHERE id_rol = '$id_object'");
        return $listado;
    }
}
