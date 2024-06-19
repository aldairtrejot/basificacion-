var valorInicial_nt = 1;
var idtable_nt = document.getElementById('idtable_nt');
var buscar_nt = document.getElementById("buscar_nt");

function siguienteValor_nt(){
    valorInicial_nt++;
    idtable_nt.textContent = valorInicial_nt;
    buscarNumTelefonico();
}

function anteriorValor_nt(){
    valorInicial_nt--;
    if(valorInicial_nt < 1){
        valorInicial_nt = 1;
    }
    idtable_nt.textContent = valorInicial_nt;
    buscarNumTelefonico();
}

function iniciarBusqueda_nt(){
    let valorInicialAux = valorInicial_nt;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
