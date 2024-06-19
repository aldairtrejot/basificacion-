<?php
class cataloUnidadResposableM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_unidad_responsable, codigo, nombre
                             FROM cat_unidad_responsable
                             ORDER BY nombre ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_unidad_responsable, CONCAT(codigo,' - ',nombre)
                             FROM cat_unidad_responsable
                             WHERE id_cat_unidad_responsable = $idObject");
        return $listado;
    }
}
