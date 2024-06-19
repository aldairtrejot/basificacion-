function validarEmergencia(){
    let nombre = document.getElementById('nombre').value.trim();
    let parentesco = document.getElementById('parentesco').value.trim();
    let primer_apellido = document.getElementById('primer_apellido').value.trim();
    let movil_emergencia = document.getElementById('movil_emergencia').value.trim();

    if (validarData(nombre,'Nombre') &&
        validarData(parentesco,'Parentesco') &&
        validarData(primer_apellido,'Apellido paterno') &&
        validarData(movil_emergencia,'Número telefónico') &&
        caracteresCount('Núm. Telefonico',10,movil_emergencia)
    ){
        agregarEditarByDbByEmergencia();
    }

}