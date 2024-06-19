<?php
class CatEstatusJuguetesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_estatus_juguetes, estatus
                             FROM cat_estatus_juguetes
                             ORDER BY estatus ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_estatus_juguetes, estatus
                             FROM cat_estatus_juguetes
                             WHERE id_cat_estatus_juguetes = $idObject");
        return $listado;
    }
}
