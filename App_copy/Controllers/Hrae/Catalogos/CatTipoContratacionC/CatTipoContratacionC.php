<?php

class catalogoTipoContratcionHraesC {
    function returnCatContratacion($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_tipo_contratacion_hraes . '">' . $row->descripcion_cont . '</option>';
        }
        return $options;
    }

    function returnCatContratacionByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_tipo_contratacion_hraes != $var[0]) {
                $options .= '<option value="' . $row->id_cat_tipo_contratacion_hraes . '">' . $row -> descripcion_cont . '</option>';
            }
        }
        return $options;
    }
}
