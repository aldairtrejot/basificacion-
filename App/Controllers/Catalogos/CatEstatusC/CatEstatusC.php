<?php

class catalogoEstatusC {
    function returnCatEstatus($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_estatus . '">' .$row->estatus . '</option>';
        }
        return $options;
    }

    function returnCatEstatusByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_estatus != $var[0]) {
                $options .= '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
            }
        }
        return $options;
    }
}
