<?php

class CatSelectC
{

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

    function selectByEdit($all, $edit)
    {
        $options = '<option value="' . $edit[0] . '">' . $edit[1] . '</option>';
        while ($row = pg_fetch_array($all)) {
            if ($row[2] != $edit[0]) {
                $options .= '<option value="' . $row[2] . '">' . $row[1]. '</option>';
            }
        }
        return $options;
    }

    function selectByEditIX($all, $edit)
    {
        $options = '<option value="' . $edit[1] . '">' . $edit[0] . '</option>';
        while ($row = pg_fetch_array($all)) {
            if ($row[1] != $edit[1]) {
                $options .= '<option value="' . $row[1] . '">' . $row[0]. '</option>';
            }
        }
        return $options;
    }

    function selecStaticText($text)
    {
        $options = '<option value="' . $text . '">' . $text . '</option>';
        return $options;
    }

    function selecStaticByNull()
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

    function selectByAllById($resultados,$value,$text)
    {
        $options = '<option value="">Seleccione</option>';
        while ($row = pg_fetch_array($resultados)) {
            $options .= '<option value="' . $row [$value] . '">' . $row [$text] . '</option>';
        }
        return $options;
    }

}