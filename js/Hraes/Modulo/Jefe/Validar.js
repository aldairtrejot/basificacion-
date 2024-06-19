function validarJefe(){
    let jefe_inmediato = document.getElementById('jefe_inmediato').value.trim();

    if (validarData(jefe_inmediato,'Jefe inmediato')
    ){
        guardarJefe();
    }
}
                            

