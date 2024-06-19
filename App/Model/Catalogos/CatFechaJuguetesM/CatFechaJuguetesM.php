<?php
class CatFechaJuguetesM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_fecha_juguetes, fecha
                             FROM cat_fecha_juguetes
                             ORDER BY fecha ASC");
        return $listado;
    }

    function obtenerElemetoById($id_object){
        $listado = pg_query("SELECT id_cat_fecha_juguetes, fecha
                             FROM cat_fecha_juguetes
                             WHERE id_cat_fecha_juguetes = $id_object");
        return $listado;
    }
}
