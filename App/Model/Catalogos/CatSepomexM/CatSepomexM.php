<?php
class CatSepomexM
{

    public function listarCountCp($codigo)
    {
        $listado = pg_query("SELECT COUNT(id_cat_sepomex)
                              FROM cat_sepomex
                              WHERE codigo_postal = '$codigo';");
        return $listado;
    }

    public function listarEntidadByCp($codigo)
    {
        $listado = pg_query("SELECT DISTINCT(UPPER(estado))
                             FROM cat_sepomex
                             WHERE codigo_postal = '$codigo';");
        return $listado;
    }

    public function listarMunicipioByCp($codigo)
    {
        $listado = pg_query("SELECT DISTINCT(UPPER(municipio))
                             FROM cat_sepomex
                             WHERE codigo_postal = '$codigo';");
        return $listado;
    }

    public function listarColoniaByMumnp($municipio)
    {
        $listado = pg_query("SELECT DISTINCT(UPPER(CONCAT(colonia, ' (',tipo_colonia,')'))),colonia
                             FROM cat_sepomex
                             WHERE TRIM(UPPER(UNACCENT(municipio))) = TRIM(UPPER(UNACCENT('$municipio'))) 
                             ORDER BY colonia ASC;");
        return $listado;
    }

    public function listarByCp($codigo)
    {
        $listado = pg_query("SELECT DISTINCT (UPPER(municipio))
                             FROM cat_sepomex
                             WHERE codigo_postal = '$codigo';");
        return $listado;
    }

    public function listarColonia($municipio, $colonia)
    {
        $listado = pg_query("SELECT colonia 
                             FROM cat_sepomex 
                             WHERE TRIM(UPPER(UNACCENT(municipio))) =  
                                    TRIM(UPPER(UNACCENT('$municipio')))
                             AND TRIM(UPPER(UNACCENT(colonia))) <> 
                                    TRIM(UPPER(UNACCENT('$colonia')))
                             ORDER BY colonia ASC;");
        return $listado;
    }
}
