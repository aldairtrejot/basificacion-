var valorInicial_de = 1;
var idtable_de = document.getElementById('idtable_de');
var buscar_de = document.getElementById("buscar_de");

function siguienteValor_de(){
    valorInicial_de++;
    idtable_de.textContent = valorInicial_de;
    buscarDependiente();
}

function anteriorValor_de(){
    valorInicial_de--;
    if(valorInicial_de < 1){
        valorInicial_de = 1;
    }
    idtable_de.textContent = valorInicial_de;
    buscarDependiente();
}

function iniciarBusqueda_de(){
    let valorInicialAux = valorInicial_de;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
