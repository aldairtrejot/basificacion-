<?php
class catalogoPlazasM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_tipo_plazas, codigo_plaza, tipo_plaza
                             FROM cat_tipo_plazas
                             ORDER BY tipo_plaza ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_tipo_plazas, CONCAT(tipo_plaza, ' - ', codigo_plaza)
                             FROM cat_tipo_plazas
                             WHERE id_cat_tipo_plazas = $idObject");
        return $listado;
    }
}
