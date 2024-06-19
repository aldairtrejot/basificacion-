<?php

class CatDependientesC {
    function selectAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_ctrl_dependientes_economicos_hraes . '">' . $row->nombre . ' ' . $row->apellido_paterno . ' ' . $row->apellido_materno . '</option>';
        }
        return $options;
    }

    function selectByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_ctrl_dependientes_economicos_hraes != $var[0]) {
                $options .= '<option value="' . $row->id_ctrl_dependientes_economicos_hraes . '">' . $row->nombre . ' ' . $row->apellido_paterno . ' ' . $row->apellido_materno . '</option>';
            }
        }
        return $options;
    }
}
