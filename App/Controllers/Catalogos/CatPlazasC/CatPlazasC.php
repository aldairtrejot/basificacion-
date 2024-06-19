<?php

class catalogoPlazasC {
    function returnCatPlazas($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_tipo_plazas . '">' . $row->tipo_plaza .' - ' .$row->codigo_plaza . '</option>';
        }
        return $options;
    }

    function returnCatPLazasByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_tipo_plazas != $var[0]) {
                $options .= '<option value="' . $row->id_cat_tipo_plazas . '">' . $row->tipo_plaza .' - ' .$row->codigo_plaza . '</option>';
            }
        }
        return $options;
    }
}
