function validarCamposPers(){

    let porcentaje_ahorro_s = document.getElementById('porcentaje_ahorro_s').value;
    let dias_medio_sueldo = document.getElementById('dias_medio_sueldo').value;
    let dias_sin_sueldo = document.getElementById('dias_sin_sueldo').value;
    let reintegro_faltas_retardos = document.getElementById('reintegro_faltas_retardos').value;
    let importe_festivo = document.getElementById('importe_festivo').value;
    let importe_horas_ex = document.getElementById('importe_horas_ex').value;
    let regimen_pen = document.getElementById('regimen_pen').value;
    let importe_prima_dominical = document.getElementById('importe_prima_dominical').value;
    let quinquenio = document.getElementById('quinquenio').value;
    let num_hijos = document.getElementById('num_hijos').value;
    let aplicar_juguetes = document.getElementById('aplicar_juguetes').value;
    let apoyo_titulacion = document.getElementById('apoyo_titulacion').value;
    let licencia_manejo = document.getElementById('licencia_manejo').value;
    let importe_recuperacion_pagos_indebidos = document.getElementById('importe_recuperacion_pagos_indebidos').value;
    let num_dias_jornada_dominical = document.getElementById('num_dias_jornada_dominical').value;
    let porcentaje_svi = document.getElementById('porcentaje_svi').value;
    let dias_sansion_adma = document.getElementById('dias_sansion_adma').value;

    if(caracteresCount('Porcentaje ahorro solidario',5,porcentaje_ahorro_s) &&
    caracteresCount('Días medio sueldo',5,dias_medio_sueldo) &&
    caracteresCount('Días sin sueldo',5,dias_sin_sueldo) &&
    caracteresCount('Reintegro faltas y retardos',5,reintegro_faltas_retardos) &&
    caracteresCount('Importa día festivo',5,importe_festivo) &&
    caracteresCount('Importe horas extra',5,importe_horas_ex) &&
    caracteresCount('Régimen pensionario',5,regimen_pen) &&
    caracteresCount('Importe prima domínical',5,importe_prima_dominical) &&
    caracteresCount('Importe descuentos indebidos',5,importe_descuentos_indebidos) &&
    caracteresCount('Quinquenio',5,quinquenio) &&
    caracteresCount('Núm. hijos',5,num_hijos) &&
    caracteresCount('Aplica juguetes',5,aplicar_juguetes) &&
    caracteresCount('Apoyo a titulación',5,apoyo_titulacion) &&
    caracteresCount('Licencia de manejo',5,licencia_manejo) &&
    caracteresCount('Importe recuperación pagos indebidos',5,importe_recuperacion_pagos_indebidos) &&
    caracteresCount('Núm. días de jornada dominical',5,num_dias_jornada_dominical) &&
    caracteresCount('Núm. días de guardia festiva',5,num_dias_guardia_festiva) &&
    caracteresCount('Porcentaje seguro de vida institucional',5,porcentaje_svi) &&
    caracteresCount('Días sanción administrativa',5,dias_sansion_adma) &&
    esEntero('Días medio sueldo',dias_medio_sueldo) &&
    esEntero('Días sin sueldo',dias_sin_sueldo)
    ) {
        agregarEditarByDbCamposPersonalizados();
    }

}



