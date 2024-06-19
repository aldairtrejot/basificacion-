<?php
class catalogoEstatus
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_estatus, estatus
                             FROM cat_estatus
                             ORDER BY estatus ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_estatus, estatus
                             FROM cat_estatus
                             WHERE id_cat_estatus = $idObject");
        return $listado;
    }
}
