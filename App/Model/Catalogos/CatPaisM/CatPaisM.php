<?php
class CatPaisM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_pais_nacimiento, nombre
                             FROM cat_pais_nacimiento
                             ORDER BY nombre ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT id_cat_pais_nacimiento, nombre
                             FROM cat_pais_nacimiento
                             WHERE id_cat_pais_nacimiento = '$id_object'");
        return $listado;
    }
}
