function validar(){
    let nombre = document.getElementById('nombre').value;
    let edad = document.getElementById('edad').value;
    let fecha_nacimiento = document.getElementById('fecha_nacimiento').value;

    bool = false;

    if (nombre == '' || edad == '' || fecha_nacimiento == ''){
        mensajeErrorOK('Los campos con * deben contener valores');
    } else {
        bool = true;
        agregarEditarUsuario();
    }
    return bool;
}
