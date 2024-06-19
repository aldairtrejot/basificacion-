<?php

class catalogoNivelesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_niveles_hraes, codigo
                             FROM cat_niveles_hraes
                             ORDER BY codigo ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_niveles_hraes, codigo
                             FROM cat_niveles_hraes
                             WHERE id_cat_niveles_hraes = $idObject");
        return $listado;
    }
}
