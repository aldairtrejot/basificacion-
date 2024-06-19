<?php

class catalogoUnidadResponsableC {
    function returnCatUnidad($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_unidad_responsable . '">' . $row->nombre .' - ' .$row->codigo . '</option>';
        }
        return $options;
    }

    function returnCatUnidadByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_unidad_responsable != $var[0]) {
                $options .= '<option value="' . $row->id_cat_unidad_responsable . '">' . $row->nombre .' - ' .$row->codigo . '</option>';
            }
        }
        return $options;
    }
}
