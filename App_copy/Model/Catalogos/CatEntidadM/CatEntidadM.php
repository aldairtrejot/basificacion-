<?php
class catalogoEntidad
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_entidad, clave_entidad, entidad
                             FROM cat_entidad
                             ORDER BY entidad ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_entidad, CONCAT(clave_entidad, ' - ', entidad)
                             FROM cat_entidad
                             WHERE id_cat_entidad = $idObject");
        return $listado;
    }
}
