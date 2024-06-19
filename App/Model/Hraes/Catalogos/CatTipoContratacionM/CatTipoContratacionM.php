<?php

class catalogoTipoContratacionM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes,
                                    CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, ' ',
                                        cat_subtipo_contratacion_hraes.subtipo)
                            FROM cat_tipo_subtipo_contratacion_hraes
                            INNER JOIN cat_tipo_contratacion_hraes
                            ON cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_contratacion_hraes =
                                cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                            INNER JOIN cat_subtipo_contratacion_hraes
                            ON cat_tipo_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes = 
                                cat_subtipo_contratacion_hraes.ID_cat_subtipo_contratacion_hraes
                            ORDER BY cat_tipo_contratacion_hraes.tipo_contratacion ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes,
                                    CONCAT(cat_tipo_contratacion_hraes.tipo_contratacion, ' ',
                                        cat_subtipo_contratacion_hraes.subtipo)
                            FROM cat_tipo_subtipo_contratacion_hraes
                            INNER JOIN cat_tipo_contratacion_hraes
                            ON cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_contratacion_hraes =
                                cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                            INNER JOIN cat_subtipo_contratacion_hraes
                            ON cat_tipo_subtipo_contratacion_hraes.id_cat_subtipo_contratacion_hraes = 
                                cat_subtipo_contratacion_hraes.ID_cat_subtipo_contratacion_hraes
                            WHERE cat_tipo_subtipo_contratacion_hraes.id_cat_tipo_subtipo_contratacion_hraes = $idObject
                            ORDER BY cat_tipo_contratacion_hraes.tipo_contratacion ASC");
        return $listado;
    }
}
