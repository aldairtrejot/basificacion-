<?php
class CatSepomexM
{
    public function listarByCp($codigo)
    {
        $listado = pg_query("SELECT DISTINCT (UPPER(d_mnpio))
                             FROM cat_sepomex
                             WHERE d_codigo = '$codigo';");
        return $listado;
    }

    public function listarCountCp($codigo){
        $listado = pg_query ("SELECT COUNT (id_cat_sepomex)
                              FROM cat_sepomex
                              WHERE d_codigo = '$codigo';");
        return $listado;
    }
    

    public function listarEntidadByCp($codigo){
        $listado = pg_query("SELECT DISTINCT(UPPER(d_estado))
                             FROM cat_sepomex
                             WHERE d_codigo = '$codigo';");
        return $listado;
    }

    public function listarMunicipioByCp($codigo){
        $listado = pg_query("SELECT DISTINCT(UPPER(d_mnpio))
                             FROM cat_sepomex
                             WHERE d_codigo = '$codigo';");
        return $listado;
    }

    public function listarColoniaByMumnp($municipio){
        $listado = pg_query("SELECT DISTINCT(UPPER(CONCAT(colonia_origen, ' (',d_tipo_asenta,')'))),colonia_origen
                             FROM cat_sepomex
                             WHERE UPPER(d_mnpio) = '$municipio'
                             ORDER BY colonia_origen ASC");
        return $listado;
    } 
}
