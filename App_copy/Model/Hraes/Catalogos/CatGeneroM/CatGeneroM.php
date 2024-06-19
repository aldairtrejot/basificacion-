<?php
class CatalogoGeneroMHraes
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_genero_hraes, genero
                             FROM cat_genero_hraes
                             ORDER BY genero ASC");
        return $listado;
    }

    public function listarElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_genero_hraes, genero
                             FROM cat_genero_hraes
                             WHERE id_cat_genero_hraes = $idObject");
        return $listado;
    }
}
