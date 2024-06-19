<?php
class CatEstudioM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_nivel_estudios, nivel_estudios
                             FROM cat_nivel_estudios
                             ORDER BY nivel_estudios ASC");
        return $listado;
    }

    public function listarElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_nivel_estudios, nivel_estudios
                             FROM cat_nivel_estudios
                             WHERE id_cat_nivel_estudios = $idObject");
        return $listado;
    }
}
