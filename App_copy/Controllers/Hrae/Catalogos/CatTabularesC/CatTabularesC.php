<?php

class catalogoTabularesC {
    function returnSelect($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_zonas_tabuladores_hraes . '">' . $row->zona_tabuladores . '</option>';
        }
        return $options;
    }

    function returnSelectByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_zonas_tabuladores_hraes != $var[0]) {
                $options .= '<option value="' . $row->id_cat_zonas_tabuladores_hraes . '">' . $row->zona_tabuladores . '</option>';
            }
        }
        return $options;
    }
}
