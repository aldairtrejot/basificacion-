<?php


class catalogoEntidadC
{
    function returnCatEntidad($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_entidad . '">' . $row->clave_entidad . ' - ' . $row->entidad . '</option>';
        }
        return $options;
    }

    function returnCatEntidadByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_entidad != $var[0]) {
                $options .= '<option value="' . $row->id_cat_entidad . '">' . $row->clave_entidad . ' - ' . $row->entidad . '</option>';
            }
        }
        return $options;
    }
}
