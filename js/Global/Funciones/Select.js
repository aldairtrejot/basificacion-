
/// LA FUNCION RETORN EL TEXTO DEL SELEC SELECCIONADO, UTILIZANDO COMO PARAMETRO
/// EL NOMBRE DEL ID DEL SELECT
function obtenerValorSelect(selectElement) {
    let indiceSeleccionado = selectElement.selectedIndex;
    let textoSeleccionado = selectElement.options[indiceSeleccionado].textContent;
    return textoSeleccionado;
}

///convierte el texto en mayuscula
function convertirAMayusculas(event, inputId) {
    let inputElement = document.getElementById(inputId);
    let texto = event.target.value;
    let textoEnMayusculas = texto.toUpperCase();
    inputElement.value = textoEnMayusculas;
  }