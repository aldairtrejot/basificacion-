<?php

class CatCapacidadM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_capacidad_dif_hraes, capacidad
                             FROM cat_capacidad_dif_hraes
                             ORDER BY capacidad ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_capacidad_dif_hraes, capacidad
                             FROM cat_capacidad_dif_hraes
                             WHERE id_capacidad_dif_hraes = $idObject");
        return $listado;
    }
}
