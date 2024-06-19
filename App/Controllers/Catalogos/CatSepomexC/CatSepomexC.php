<?php

class CatSepomexC
{
    function selecByNull()
    {
        $options = '<option value="' . '' . '">' . 'Seleccione' . '</option>';
        return $options;
    }

    function selectByAll($resultados)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row [0] . '">' . $row [0] . '</option>';
        }
        return $options;
    }

    function selectMunicipioByCp($resultados, $text)
    {
        $options = '<option value="' . $text . '">' . $text . '</option>';
        while ($row = pg_fetch_array($resultados)) {
            if ($row[0] != $text) {
                $options .= '<option value="' . $row[0] . '">' . $row[0]. '</option>';
            }
        }
        return $options;
    }

    function selecStaticText($text)
    {
        $options = '<option value="' . $text . '">' . $text . '</option>';
        return $options;
    }
}