<?php
class CatalogoDependientesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_dependientes_economicos, nombre
                             FROM cat_dependientes_economicos
                             ORDER BY nombre ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_dependientes_economicos, nombre
                             FROM cat_dependientes_economicos
                             WHERE id_cat_dependientes_economicos = $idObject");
        return $listado;
    }
}
