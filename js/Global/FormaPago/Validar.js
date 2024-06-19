function validarCLABE(clabe) {
    // Expresión regular para validar CLABE
    var regexCLABE = /^[0-9]{18}$/;

    // Verificar si la CLABE coincide con el formato esperado
    if (!regexCLABE.test(clabe)) {
        return false;
    }

    // Calcular dígito de control
    var peso = [3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1];
    var suma = 0;
    for (var i = 0; i < 17; i++) {
        suma += parseInt(clabe.charAt(i)) * peso[i];
    }
    var residuo = suma % 10;
    var digitoControl = (10 - residuo) % 10;

    // Verificar si el dígito de control coincide
    return parseInt(clabe.charAt(17)) === digitoControl;
}

// Ejemplo de uso
/*
var clabe = "032180000118359719";
if (validarCLABE(clabe)) {
    console.log("La CLABE es válida.");
} else {
    console.log("La CLABE no es válida.");
}a
*/