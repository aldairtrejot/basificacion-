<?php
class CatConceptoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_concepto,concepto,porcentaje
                             FROM cat_concepto
                             ORDER BY concepto ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT cat_concepto.id_cat_concepto,
                                    cat_concepto.concepto
                            FROM cat_concepto
                            INNER JOIN cat_valores
                            ON cat_concepto.id_cat_concepto =
                                cat_valores.id_cat_concepto
                            WHERE cat_valores.id_cat_valores = $id_object;");
        return $listado;
    }
    
    public function listarByName($id)
    {
        $listado = pg_query("SELECT id_cat_concepto,concepto,porcentaje
                             FROM cat_concepto
                             WHERE id_cat_concepto = $id");
        return $listado;
    }
}
