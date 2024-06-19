<?php
class catalogoPlazasM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_plazas, codigo_plaza, tipo_plaza
                             FROM cat_plazas
                             ORDER BY tipo_plaza ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_plazas, CONCAT(tipo_plaza, ' - ', codigo_plaza)
                             FROM cat_plazas
                             WHERE id_cat_plazas = $idObject");
        return $listado;
    }
}
