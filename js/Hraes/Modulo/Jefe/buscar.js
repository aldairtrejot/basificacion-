var valorInicial_j = 1;
var textValor_j = document.getElementById('idtable_j');
var buscar_j = document.getElementById("buscar_j");

function siguienteValor_j(){
    valorInicial_j++;
    textValor_j.textContent = valorInicial_j;
    buscarJefe();
}

function anteriorValor_j(){
    valorInicial_j--;
    if(valorInicial_j < 1){
        valorInicial_j = 1;
    }
    textValor_j.textContent = valorInicial_j;
    buscarJefe();
}

function iniciarBusqueda_j(){
    let valorInicialAux = valorInicial_j;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
