var valorInicial_pe = 1;
var idtable_pe = document.getElementById('idtable_pe');
var buscar_pe = document.getElementById("buscar_pe");

function siguienteValor_pe(){
    valorInicial_pe++;
    idtable_pe.textContent = valorInicial_pe;
    buscarPercepcion();
}

function anteriorValor_pe(){
    valorInicial_pe--;
    if(valorInicial_pe < 1){
        valorInicial_pe = 1;
    }
    idtable_pe.textContent = valorInicial_pe;
    buscarPercepcion();
}

function iniciarBusqueda_pe(){
    let valorInicialAux = valorInicial_pe;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
