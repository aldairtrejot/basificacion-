<?php

class catalogoTipoContratcionHraesC {
    function returnCatContratacion($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row[0] . '">' . $row[1] . '</option>';
        }
        return $options;
    }

    function returnCatContratacionByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[0] . '">' . $var[1] . '</option>';
        while ($row = pg_fetch_array($resultados)) {
            if ($row[0] != $var[0]) {
                $options .= '<option value="' . $row[0] . '">' . $row[1] . '</option>';
            }
        }
        return $options;
    }
}
