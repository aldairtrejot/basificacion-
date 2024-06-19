<?php


class CatalogoGeneroC
{
    function selectByAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_genero . '">' . $row->genero . '</option>';
        }
        return $options;
    }

    function selectById($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_genero != $var[0]) {
                $options .= '<option value="' . $row->id_cat_genero . '">' . $row->genero . '</option>';
            }
        }
        return $options;
    }
}
