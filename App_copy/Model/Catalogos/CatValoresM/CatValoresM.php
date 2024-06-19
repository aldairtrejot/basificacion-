<?php
class CatValoresM
{
    function listarByIdConcepto($id){
        $listado = pg_query ("SELECT id_cat_concepto
                             FROM cat_valores
                             WHERE id_cat_valores = $id");
    return $listado;
    }

    public function listarByAll($id)
    {
        $listado = pg_query("SELECT id_cat_valores, valor
                             FROM cat_valores
                             WHERE id_cat_concepto = $id
                             ORDER BY valor ASC");
        return $listado;
    }

    public function listarById($id)
    {
        $listado = pg_query("SELECT id_cat_valores, valor
                             FROM cat_valores
                             WHERE id_cat_valores = $id
                             ORDER BY valor ASC");
        return $listado;
    }

}
