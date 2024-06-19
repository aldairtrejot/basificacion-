var valorInicial_c = 1;
var textValor_c = document.getElementById('idtable_c');
var buscar_c = document.getElementById("buscar_c");

function siguienteValor_c(){
    valorInicial_c++;
    textValor_c.textContent = valorInicial_c;
    buscarCedula();
}

function anteriorValor_c(){
    valorInicial_c--;
    if(valorInicial_c < 1){
        valorInicial_c = 1;
    }
    textValor_c.textContent = valorInicial_c;
    buscarCedula();
}

function iniciarBusqueda_c(){
    let valorInicialAux = valorInicial_c;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}

///LA FUNCION RETORNA EL VALOR SIN ACENTOS, ESPACIOS EN BLANCA O CARACTERES ESPECIALES
function clearElement(valuex){
    return valuex.value.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

///LA FUNCION RETORNA EL TOTAL DE CARACTERES DEL VALOR
function lengthValue(value){
    return value.length;
}
