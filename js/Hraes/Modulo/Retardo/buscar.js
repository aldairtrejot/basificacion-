var valorInicial_re = 1;
var idtable_re = document.getElementById('idtable_re');
var buscar_re = document.getElementById("campoFecha");

function siguienteValor_re(){
    valorInicial_re++;
    idtable_re.textContent = valorInicial_re;
    buscarRetardo();
}

function anteriorValor_re(){
    valorInicial_re--;
    if(valorInicial_re < 1){
        valorInicial_re = 1;
    }
    idtable_re.textContent = valorInicial_re;
    buscarRetardo();
}

function iniciarBusqueda_re(){
    let valorInicialAux = valorInicial_re;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
