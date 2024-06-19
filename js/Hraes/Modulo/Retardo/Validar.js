function validarDependiente(){
    let fecha_retardo = document.getElementById('fecha_retardo').value;
    let hora_entrada = document.getElementById('hora_entrada').value;
    
    if (validarData(fecha_retardo,'Fecha') &&
        validarData(hora_entrada,'Hora entrada')
    ){
        guardarRetardo();
    }    
}