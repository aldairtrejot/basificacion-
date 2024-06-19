<?php

class CatCarrerasHraesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_carrera_hraes, carrera
                             FROM cat_carrera_hraes
                             ORDER BY carrera ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_carrera_hraes, carrera
                             FROM cat_carrera_hraes
                             WHERE id_cat_carrera_hraes = $idObject");
        return $listado;
    }
}
