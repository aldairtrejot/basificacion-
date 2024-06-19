var valorInicial_e = 1;
var textValor = document.getElementById('idtable_e');
var buscar_e = document.getElementById("buscar_e");

function siguienteValor_e(){
    valorInicial_e++;
    textValor.textContent = valorInicial_e;
    buscarEmergencia();
}

function anteriorValor_e(){
    valorInicial_e--;
    if(valorInicial_e < 1){
        valorInicial_e = 1;
    }
    textValor.textContent = valorInicial_e;
    buscarEmergencia();
}

function iniciarBusqueda_e(){
    let valorInicialAux = valorInicial_e;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}

/*
///LA FUNCION RETORNA EL VALOR SIN ACENTOS, ESPACIOS EN BLANCA O CARACTERES ESPECIALES
function clearElement(value){
    return value.value.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

///LA FUNCION RETORNA EL TOTAL DE CARACTERES DEL VALOR
function lengthValue(value){
    return value.length;
}*/