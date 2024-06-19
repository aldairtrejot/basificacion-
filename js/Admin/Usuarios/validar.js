function validarUsuario(){

    let nombre = document.getElementById('nombre').value;
    let nick = document.getElementById('nick').value;
    let password = document.getElementById('password').value;
    let passwordConfirm = document.getElementById('passwordConfirm').value;
    let id_rol = document.getElementById('id_rol').value.trim();

    if (validarData(nick,'Nick') &&
        validarData(nombre,'Nombre') &&
        validarData(password,'Contraseña') &&
        validarData(passwordConfirm,'Confirmar contraseña') &&
        validarData(id_rol,'Rol') &&
        validarPw(password,passwordConfirm) 
    ){
        if(validarAccion()){
            guardarUsuario();
        }
    } 
}

function validarPw(pw1, pw2){
    let bool = true;
    if (pw1 != pw2){
        mensajeError('Las contraseñas no coinciden');
        bool = false;
    }
    return bool;
}

