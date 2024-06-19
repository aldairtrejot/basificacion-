<?php
class CatEstadoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_estado_nacimiento, nombre
                             FROM cat_estado_nacimiento
                             ORDER BY nombre ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT id_cat_estado_nacimiento, nombre
                             FROM cat_estado_nacimiento
                             WHERE id_cat_estado_nacimiento = '$id_object'");
        return $listado;
    }

    public function listarEstado($idPais){
        $listado = pg_query("SELECT cat_estado_nacimiento.id_cat_estado_nacimiento,
                                cat_estado_nacimiento.nombre
                            FROM cat_pais_estado_nacimiento
                            INNER JOIN cat_estado_nacimiento
                            ON cat_pais_estado_nacimiento.id_cat_estado_nacimiento = 
                                cat_estado_nacimiento.id_cat_estado_nacimiento
                            INNER JOIN cat_pais_nacimiento
                            ON cat_pais_estado_nacimiento.id_cat_pais_nacimiento =
                                cat_pais_nacimiento.id_cat_pais_nacimiento
                            WHERE cat_pais_nacimiento.id_cat_pais_nacimiento = $idPais
                            ORDER BY cat_estado_nacimiento.nombre ASC;");
        return $listado;
    } 
}
