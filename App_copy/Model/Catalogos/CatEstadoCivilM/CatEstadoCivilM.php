<?php
class CatEstadoCivilM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_estado_civil, estado_civil
                             FROM cat_estado_civil
                             ORDER BY estado_civil ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_estado_civil, estado_civil
                             FROM cat_estado_civil
                             WHERE id_cat_estado_civil = $idObject");
        return $listado;
    }
}
