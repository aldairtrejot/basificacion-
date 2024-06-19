<?php
class CatBancoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_banco, identificador, nombre
                             FROM cat_banco
                             ORDER BY identificador ASC");
        return $listado;
    }

    public function listarByIdCatBanco($id_object)
    {
        $listado = pg_query("SELECT nombre
                             FROM cat_banco
                             WHERE id_cat_banco = '$id_object'");
        return $listado;
    }
    public function listarById($id_object)
    {
        $listado = pg_query("SELECT COUNT(*),id_cat_banco, nombre, identificador
                             FROM cat_banco
                             WHERE identificador = '$id_object'
                             GROUP BY id_cat_banco, nombre, identificador");
        return $listado;
    }

    public function listarByCount($id_obeject){
        $listado = pg_query("SELECT COUNT(*)
                             FROM cat_banco
                             WHERE identificador = '$id_obeject'");
        return $listado;
    }
}
