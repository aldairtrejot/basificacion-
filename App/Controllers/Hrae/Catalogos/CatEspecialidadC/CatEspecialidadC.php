<?php

class CatEspecialidadC {
    function selectByAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_cat_especialidad_hraes . '">' . $row->especialidad . '</option>';
        }
        return $options;
    }

    function selectByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_cat_especialidad_hraes != $var[0]) {
                $options .= '<option value="' . $row->id_cat_especialidad_hraes . '">' . $row->especialidad . '</option>';
            }
        }
        return $options;
    }
}
