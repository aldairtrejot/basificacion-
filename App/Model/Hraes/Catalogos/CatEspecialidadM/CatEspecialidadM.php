<?php

class catEspecialidadM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_especialidad_hraes, especialidad
                             FROM cat_especialidad_hraes
                             ORDER BY especialidad ASC;");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_especialidad_hraes, especialidad
                             FROM cat_especialidad_hraes
                             WHERE id_cat_especialidad_hraes = $idObject;");
        return $listado;
    }
}
