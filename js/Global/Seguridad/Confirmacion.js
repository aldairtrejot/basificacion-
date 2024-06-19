function validarAccion(){
    let bool = false;
    let superPw = 'sirh2024*'; ///CONTRASEÑA DE SUPER USUARIO
    let pw =prompt('Ingrese contraseña para continuar: ');
    if (pw != superPw){
        alert('Contraseña incorrecta');
    } else {
        bool = true;
    }
    return bool;
}