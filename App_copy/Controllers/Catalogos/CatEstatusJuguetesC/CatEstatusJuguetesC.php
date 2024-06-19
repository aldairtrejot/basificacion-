<?php

class CatEstatusJuguetesC {
    function selectAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_estatus_juguetes . '">' .$row->estatus . '</option>';
        }
        return $options;
    }

    function selectEstatusByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_estatus_juguetes != $var[0]) {
                $options .= '<option value="' . $row->id_cat_estatus_juguetes . '">' . $row->estatus . '</option>';
            }
        }
        return $options;
    }
}
