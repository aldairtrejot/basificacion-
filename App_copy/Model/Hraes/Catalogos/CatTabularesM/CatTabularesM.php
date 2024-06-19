<?php

class catalogoTabularesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_zonas_tabuladores_hraes, zona_tabuladores
                             FROM cat_zona_tabuladores_hraes
                             ORDER BY zona_tabuladores ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_zonas_tabuladores_hraes, zona_tabuladores
                             FROM cat_zona_tabuladores_hraes
                             WHERE id_cat_zonas_tabuladores_hraes = $idObject");
        return $listado;
    }
}
