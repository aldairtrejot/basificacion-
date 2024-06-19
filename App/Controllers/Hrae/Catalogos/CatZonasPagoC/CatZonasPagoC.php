<?php

class CatZonaPagoC {
    function returnSelect($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row[1] . '">' . $row[0] . '</option>';
        }
        return $options;
    }

    function returnSelectByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[1] . '">' . $var[0] . '</option>';
        while ($row = pg_fetch_array($resultados)) {
            if ($row[1] != $var[1]) {
                $options .= '<option value="' . $row[1] . '">' . $row[0] . '</option>';
            }
        }
        return $options;
    }
}
