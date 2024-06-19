<?php
class CatNombramientoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_caracter_nom_hraes, caracter_nom
                             FROM cat_caracter_nom_hraes
                             ORDER BY caracter_nom ASC");
        return $listado;
    }

    public function listarByIdEdit($id_object)
    {
        $listado = pg_query("SELECT id_cat_caracter_nom_hraes, caracter_nom
                             FROM cat_caracter_nom_hraes
                             WHERE id_cat_caracter_nom_hraes = '$id_object'");
        return $listado;
    }
}
