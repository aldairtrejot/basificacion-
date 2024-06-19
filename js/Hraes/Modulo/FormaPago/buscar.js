var valorInicial_f = 1;
var textValor_f = document.getElementById('idtable_f');
var buscar_f = document.getElementById("buscar_f");

function siguienteValor_f(){
    valorInicial_f++;
    textValor_f.textContent = valorInicial_f;
    buscarFormaPago();
}

function anteriorValor_f(){
    valorInicial_f--;
    if(valorInicial_f < 1){
        valorInicial_f = 1;
    }
    textValor_f.textContent = valorInicial_f;
    buscarFormaPago();
}

function iniciarBusqueda_f(){
    let valorInicialAux = valorInicial_f;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
