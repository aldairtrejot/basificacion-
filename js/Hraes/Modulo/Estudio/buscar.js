var valorInicial_ne = 1;
var idtable_ne = document.getElementById('idtable_ne');
var buscar_ne = document.getElementById("buscar_ne");

function siguienteValor_ne(){
    valorInicial_ne++;
    idtable_ne.textContent = valorInicial_ne;
    buscarEstudio();
}

function anteriorValor_ne(){
    valorInicial_ne--;
    if(valorInicial_ne < 1){
        valorInicial_ne = 1;
    }
    idtable_ne.textContent = valorInicial_ne;
    buscarEstudio();
}

function iniciarBusqueda_ne(){
    let valorInicialAux = valorInicial_ne;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
