var valorInicial_ce = 1;
var idtable_ce = document.getElementById('idtable_ce');
var buscar_ce = document.getElementById("buscar_ce");

function siguienteValor_ce(){
    valorInicial_ce++;
    idtable_ce.textContent = valorInicial_ce;
    buscarCorreo();
}

function anteriorValor_ce(){
    valorInicial_ce--;
    if(valorInicial_ce < 1){
        valorInicial_ce = 1;
    }
    idtable_ce.textContent = valorInicial_ce;
    buscarCorreo();
}

function iniciarBusqueda_ce(){
    let valorInicialAux = valorInicial_ce;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
