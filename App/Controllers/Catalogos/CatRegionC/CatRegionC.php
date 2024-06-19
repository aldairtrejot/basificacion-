<?php

class catalogoRegionC {
    function returnCatRegion($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_region . '">' . $row->clave_region .' - ' .$row->region . '</option>';
        }
        return $options;
    }

    function returnCatRegionByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_region != $var[0]) {
                $options .= '<option value="' . $row->id_cat_region . '">' . $row->clave_region .' - ' .$row->region . '</option>';
            }
        }
        return $options;
    }
}
