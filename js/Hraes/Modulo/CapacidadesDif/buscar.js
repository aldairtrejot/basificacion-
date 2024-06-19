var valorInicial_cf = 1;
var textValor_cf = document.getElementById('idtable_cf');
var buscar_cf = document.getElementById("buscar_cf");

function siguienteValor_cf(){
    valorInicial_cf++;
    textValor_cf.textContent = valorInicial_cf;
    buscarCapacidadesDif();
}

function anteriorValor_cf(){
    valorInicial_cf--;
    if(valorInicial_cf < 1){
        valorInicial_cf = 1;
    }
    textValor_cf.textContent = valorInicial_cf;
    buscarCapacidadesDif();
}

function iniciarBusqueda_cf(){
    let valorInicialAux = valorInicial_cf;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
