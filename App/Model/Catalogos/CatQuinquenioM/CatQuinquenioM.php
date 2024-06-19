<?php
class CatQuinquenioM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_quinquenio, importe
                             FROM cat_quinquenio
                             ORDER BY importe ASC");
        return $listado;
    }

    public function listarElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_quinquenio, importe
                             FROM cat_quinquenio
                             WHERE id_cat_quinquenio = $idObject");
        return $listado;
    }
}
