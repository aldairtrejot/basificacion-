<?php

class CatZonaPagoC {
    function returnSelect($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_object($resultados)) {
            $options .= '<option value="' . $row->id_tbl_zonas_pago_hares . '">' . $row->codigo . '</option>';
        }
        return $options;
    }

    function returnSelectByIdObject($resultados, $var)
    {
        $options = '<option value="' . $var[1] . '">' . $var[0] . '</option>';
        while ($row = pg_fetch_object($resultados)) {
            if ($row->id_tbl_zonas_pago_hares != $var[1]) {
                $options .= '<option value="' . $row->id_tbl_zonas_pago_hares . '">' . $row->codigo . '</option>';
            }
        }
        return $options;
    }
}
