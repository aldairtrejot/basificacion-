<?php

class catalogoPuestosC {
    function returnCatPuestos($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_puesto_hraes . '">' . $row->nombre_posicion . ' - '.$row->codigo_puesto . '</option>';
        }
        return $options;
    }

    function returnCatPuestosByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_puesto_hraes != $var[0]) {
                $options .= '<option value="' . $row->id_cat_puesto_hraes . '">' . $row->nombre_posicion . ' - '.$row->codigo_puesto . '</option>';
            }
        }
        return $options;
    }
}
