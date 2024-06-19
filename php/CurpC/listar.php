<?php

include('../../validar_sesion.php');
include('../../conexion.php');


function validacionCurpMenorExista($curp, $id_fecha)
{
    $curpSn = trim($curp);
    $listado = pg_query("SELECT COUNT(ctrl_juguetes.id_ctrl_juguetes)
                         FROM ctrl_juguetes
                         INNER JOIN tbl_dependientes_economicos
                         ON ctrl_juguetes.id_tbl_dependientes_economicos = tbl_dependientes_economicos.id_tbl_dependientes_economicos
                         WHERE tbl_dependientes_economicos.curp = TRIM('$curpSn')
                         AND id_cat_fecha_juguetes = $id_fecha;");
    $row = pg_fetch_array($listado);
    $res = $row[0];
    return $res;
}

function validarFechaNecimiento($fechaNacimiento, $fechaDiferencia)
{
    $datetime1 = new DateTime($fechaNacimiento);
    $datetime2 = new DateTime($fechaDiferencia);
    $interval = $datetime1->diff($datetime2);
    $anio = $interval->y;
    $mes = $interval->m;
    $dia = $interval->d;
    return "$anio.$mes";
}

///OBTENER FECHA DE LA CURP
function obtenerFechaNacimiento($curp)
{
    // Extraer los primeros 10 caracteres de la CURP que corresponden a la fecha de nacimiento
    $fecha_nacimiento = substr($curp, 4, 6);

    // Separar la fecha en año, mes y día
    $anio = substr($fecha_nacimiento, 0, 2);
    $mes = substr($fecha_nacimiento, 2, 2);
    $dia = substr($fecha_nacimiento, 4, 2);

    // Combinar en un formato de fecha legible
    $fecha_legible = "20$anio-$mes-$dia"; // Se asume que la CURP tiene formato anterior a 2000, puedes ajustar esto según tus necesidades

    $fecha = new DateTime($fecha_legible);

    // Imprimir la fecha en el formato deseado
    //echo 'Fecha convertida: ' . $fecha->format('Y-m-d');
    return $fecha->format('Y-m-d');
}

/// LA FUNCION OBTIENE EL ID DE EMPLEADO DEPENDIENDO SI SU RFC O CURP SE ENCUENTRAN DENTRO DEL SISTEMA Y QUE EL TIPO DE CONTRATACION PERTENECE AL ID 3



function validateCurp($string = '')
{
    $string = trim($string);
    if (strlen($string) != 18) {
        return false;
    }

    // TRANSFORMARMOS EN STRING EN MAYÚSCULAS RESPETANDO LAS Ñ PARA EVITAR ERRORES
    $string = mb_strtoupper($string, "UTF-8");
    // EL REGEX POR @MARIANO
    $pattern = "/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/";
    $validate = preg_match($pattern, $string, $match);
    if ($validate === false) {
        // SI EL STRING NO CUMPLE CON EL PATRÓN REQUERIDO RETORNA FALSE
        return false;
    }
    if (count($match) == 0) {
        return false;
    }
    // ASIGNAMOS VALOR DE 0 A 36 DIVIDIENDO EL STRING EN UN ARRAY
    $ind = preg_split('//u', '0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ', null, PREG_SPLIT_NO_EMPTY);
    // REVERTIMOS EL CURP Y LE COLOCAMOS UN DÍGITO EXTRA PARA QUE EL VALOR DEL PRIMER CARACTER SEA 0 Y EL DEL PRIMER DIGITO DE LA CURP (INVERSA) SEA 1
    $vals = str_split(strrev($match[0] . "?"));
    // ELIMINAMOS EL CARACTER ADICIONAL Y EL PRIMER DIGITO DE LA CURP (INVERSA)
    unset($vals[0]);
    unset($vals[1]);
    $tempSum = 0;
    foreach ($vals as $v => $d) {
        // SE BUSCA EL DÍGITO DE LA CURP EN EL INDICE DE LETRAS Y SU CLAVE(VALOR) SE MULTIPLICA POR LA CLAVE(VALOR) DEL DÍGITO. TODO ESTO SE SUMA EN $tempSum
        $tempSum = (array_search($d, $ind) * $v) + $tempSum;
    }
    // ESTO ES DE @MARIANO NO SUPE QUE ERA
    $digit = 10 - $tempSum % 10;
    // SI EL DIGITO CALCULADO ES 10 ENTONCES SE REASIGNA A 0
    $digit = $digit == 10 ? 0 : $digit;
    // SI EL DIGITO COINCIDE CON EL ÚLTIMO DÍGITO DE LA CURP RETORNA TRUE, DE LO CONTRARIO FALSE
    return $match[2] == $digit;
}