<?php

class catalogoPuestoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_puesto_hraes, codigo_puesto, nombre_posicion
                             FROM cat_puesto_hraes
                             ORDER BY nombre_posicion ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_puesto_hraes, CONCAT(nombre_posicion, ' - ', codigo_puesto) 
                             FROM cat_puesto_hraes
                             WHERE id_cat_puesto_hraes = $idObject");
        return $listado;
    }
}
