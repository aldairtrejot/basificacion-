 
    //Se obtienen los datos asi como los del mensaje
    function validarCaracteresNick() {
        let rnick = document.getElementById("rnickA"); //Se obtiene el valor de msj nick
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        nick.value = nick.value.toUpperCase(); //La funcion convierte a mayusculas el campo nick
        if (mensajeDD(nick.value, 5, 10) === "") {
            if (validateNick(nick.value)){
                rnick.value = "*Nick iguales";
            } else {
                rnick.value = "";
            }
        } else {
            rnick.value = mensajeDD(nick.value, 5, 10);
        }
    }

    //rnick.value = mensajeDD(nick.value, 5, 10);
    function validateNick(nick) {
        let arrayJS = JSON.parse(document.getElementById('row').value);
        console.log(arrayJS);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == nick) {
                bool = true;
                i++;
            }
        }
        return bool;
    }

 
 //La funcion retorna el msj con dos variables
 function mensajeDD(cadena, min, max) {
    if (cadena.length >= min && cadena.length <= max || cadena.length == 0) {
        return "";
    } else {
        return "*El campo debe contener de " + min + " a " + max + " caracteres.";
    }
}

//Validar caracteres para password 
function validarCaracteresPW1() {
    let pw1 = document.getElementById("pwA");
    let rpw1 = document.getElementById("rpwA");
    rpw1.value = mensajeDD(pw1.value, 8, 15);
}

//Validar caracteres para password 
function validarCaracteresPW2() {
    let pw2 = document.getElementById("psA2");
    let rpw2 = document.getElementById("rpsA2");
    rpw2.value = mensajeDD(pw2.value, 8, 15);
}

//Varidar caracteres para nombre
function validarCaracteresNombre() {
    let nombre = document.getElementById("nombreA"); //Se obtiene el valor de nombre
    let rnombre = document.getElementById("rnombreA"); //Se obtiene el valor de repuesta nombre
    rnombre.value = mensajeDD(nombre.value, 1, 60);
}

/**
    * Se utiliza para hacer validaciones de datos
    */

//La funcion retorna verdadero o falso, dependiendo la cantidad de caracterestes donde ini: num caracter mini, fin: nume= caracteres maximo y var la cadena
function tamano(valor, minimo, maximo) {
    if (valor.length >= minimo && valor.length <= maximo || valor.length == 0) {
        return false; //Retorna falso si concuerda con las caracteristicas
    } else {
        return true; // Retorna verdadero si no concuerda con las caracteristicas
    }
}

function validar() {
    //Obtenemos el valor de los datos
    let nick = document.getElementById("nickA").value; //Se obtiene el valor de nick
    let nombre = document.getElementById("nombreA").value; //Se obtiene el valor de nombre
    let pw1 = document.getElementById("pwA").value; //Se obtiene el valor de password
    let pw2 = document.getElementById("psA2").value; //Se obtiene el valor de confirm password
    let rol = document.getElementById("rolA").value; //Se obtiene el valor de rol
    let bool = false;

    if (emptyData(nick) ||
        emptyData(nombre) ||
        emptyData(pw1) ||
        emptyData(pw2) ||
        emptyData(rol)) {
        Swal.fire({
            title: "¡Campos incompletos!",
            text: "Los campos no pueden estar vacios",
            icon: "error"
        });
    } else if (tamano(nick, 5, 10) ||
            tamano(nombre, 1, 60) ||
            tamano(pw1, 8, 15) ||
            tamano(pw2, 8, 15) 
    ){
        Swal.fire({
            title: "¡Numero de caracteres!",
            text: "Verifique el numero de caracteres",
            icon: "error"
        });
    } else if (validatePwN(pw1, pw2)) {
        Swal.fire({
            title: "¡Las contrasenas no coinciden!",
            text: "Verifique que las contrasenas seas iguales",
            icon: "error"
        });
    } else if (validateNick(nick)){
        Swal.fire({
            title: "¡El campo Nick ya existe!",
            text: "Verifique que las contrasenas seas iguales",
            icon: "error"
        });
    }else {
        bool = true;
    }
    return bool;
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
