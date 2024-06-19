function validar() {
    //Obtenemos el valor de los datos
    let nick = document.getElementById("nickN").value;
    let nombre = document.getElementById("nombreN").value;
    let pw = document.getElementById("pwN").value;
    let confirmarpw = document.getElementById("confirmarpwN").value;
    let bool = false;

    if (emptyData(nick) || emptyData(nombre)) {
        Swal.fire({
            title: "¡Campos incompletos!",
            text: "Los campos no pueden estar vacios",
            icon: "error"
        });
    } else if (valPw(pw, confirmarpw)) {
        Swal.fire({
            title: "¡Las contrasenas no coinciden!",
            text: "Verifique que las contrasenas seas iguales",
            icon: "error"
        });
    }
    else {
        bool = true;
    }
    return bool;
}

/**
 * La funcion valida que se hayan ingresado cualquiera de los 2 campos de pw que
 * haya ingresado el usuario, despues valida que las pw sea iguales.
 */
function valPw(pw1, pw2) {
    if (!emptyData(pw1) || !emptyData(pw2)) {
        if (validatePwN(pw1, pw2)) {
            return true; // Retorna verdadero si se cambian las contrasenas
        }
    }
    return false; //Retorna falso en caso de que las pw sean incorrectas o solo se haya captudaro una de las dos
}

// La funcion retorna verdadero o falso si el dato ingresado esta vacio
function emptyData(value) {
    if (value.trim().length === 0) {
        return true; //No tiene datos
    } else {
        return false; //Tiene datos
    }
}
//La funcion compara dos campos para saber si son iguales, retorna verdadero o falso
function validatePwN(pw1, pw2) {
    if (pw1 == pw2) {
        return false; //Pw iguales
    } else {
        return true; //Pw diferentes
    }
}

