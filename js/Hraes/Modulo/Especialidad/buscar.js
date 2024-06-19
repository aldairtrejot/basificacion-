var valorInicial_es = 1;
var idtable_espe = document.getElementById('idtable_espe');
var buscar_es = document.getElementById("buscar_es");

function siguienteValor_es(){
    valorInicial_es++;
    idtable_espe.textContent = valorInicial_es;
    buscarEspecialidad();
}

function anteriorValor_es(){
    valorInicial_es--;
    if(valorInicial_es < 1){
        valorInicial_es = 1;
    }
    idtable_espe.textContent = valorInicial_es;
    buscarEspecialidad();
}

function iniciarBusqueda_es(){
    let valorInicialAux = valorInicial_es;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
