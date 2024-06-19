var valorInicial = 1;
var textValor = document.getElementById('idtable');
var buscar = document.getElementById("buscar");
//var buscar = document.getElementById("buscarUsuario").value.trim();


function siguienteValor(){
    valorInicial++;
    textValor.textContent = valorInicial;
    buscarCentro();
}

function anteriorValor(){
    valorInicial--;
    if(valorInicial < 1){
        valorInicial = 1;
    }
    textValor.textContent = valorInicial;
    buscarCentro();
}

function iniciarBusqueda(){
    let valorInicialAux = valorInicial;
    valorInicialAux --;
    let valoroff = valorInicialAux * 7;
    return valoroff;
}

///LA FUNCION RETORNA EL VALOR SIN ACENTOS, ESPACIOS EN BLANCA O CARACTERES ESPECIALES
function clearElement(value){
    return value.value.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

///LA FUNCION RETORNA EL TOTAL DE CARACTERES DEL VALOR
function lengthValue(value){
    return value.length;
}