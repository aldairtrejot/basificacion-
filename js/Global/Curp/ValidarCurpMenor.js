function obtenerFechaNacimiento(curp) {
    if (curp.length < 18) {
        return false;
    }
    let fechaNacimiento = curp.substr(4, 6);
    let año = fechaNacimiento.substr(0, 2);
    let añoCompleto = (año < 50) ? "20" + año : "19" + año;
    let mes = fechaNacimiento.substr(2, 2);
    let dia = fechaNacimiento.substr(4, 2);
    let fechaCompleta = añoCompleto + "-" + mes + "-" + dia;
    return fechaCompleta;
}

function diferenciaFechas(fechaInicio, fechaFin) {
    var diff = new Date(fechaFin - fechaInicio);
    var años = diff.getUTCFullYear() - 1970;
    var meses = diff.getUTCMonth();
    var días = diff.getUTCDate() - 1;
    return años + '.' + meses;
}

function validarFecha(fecha) {
    let edadMaxima = 12;
    if (fecha < edadMaxima) {
        return true;
    } else {
        return false;
    }
}

function validarFechaNacimiento(curp, fecha) {
    let fechaCurp = obtenerFechaNacimiento(curp);
    let fechaInicio = new Date(fecha);//Mayor CATALOGO
    let fechaFin = new Date(fechaCurp); //MEnor
    let fechaDif = diferenciaFechas(fechaFin, fechaInicio);
    let bool = validarFecha(fechaDif);
    return bool;
}