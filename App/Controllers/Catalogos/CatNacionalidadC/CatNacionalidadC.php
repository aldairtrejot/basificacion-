<?php


class CatNacionalidadC
{
    private $mexicana = 'MEXICANA';
    private $extranjero = 'EXTRAJERO';
    function selectByAll()
    {
        $CatNacionalidadC = new CatNacionalidadC();

        $options = '<option value="">Seleccione</option>';
        $options .= '<option value="'.$CatNacionalidadC->mexicana.'">'.$CatNacionalidadC->mexicana.'</option>';
        $options .= '<option value="'.$CatNacionalidadC->extranjero.'">'.$CatNacionalidadC->extranjero.'</option>';
        return $options;
    }

    function selectById($resultados)
    {
        $CatNacionalidadC = new CatNacionalidadC();

        $options = '<option value="' . $resultados. '">' . $resultados. '</option>';
            if ($resultados != $CatNacionalidadC->mexicana) {
                $options .= '<option value="' . $CatNacionalidadC->mexicana . '">' . $CatNacionalidadC->mexicana . '</option>';
            } else {
                $options .= '<option value="' . $CatNacionalidadC->extranjero . '">' . $CatNacionalidadC->extranjero . '</option>';
            }
        
        return $options;
    }
}
