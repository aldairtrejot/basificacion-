var valorInicial_ju = 1;
var idtable_ju = document.getElementById('idtable_ju');
var buscar_ju = document.getElementById("buscar_ju");

function siguienteValor_ju(){
    valorInicial_ju++;
    idtable_ju.textContent = valorInicial_ju;
    buscarJuguete();
}

function anteriorValor_ju(){
    valorInicial_ju--;
    if(valorInicial_ju < 1){
        valorInicial_ju = 1;
    }
    idtable_ju.textContent = valorInicial_ju;
    buscarJuguete();
}

function iniciarBusqueda_ju(){
    let valorInicialAux = valorInicial_ju;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
