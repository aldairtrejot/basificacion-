function validarJuguete(){
    let cat_test_bas = document.getElementById('cat_test_bas').value.trim();
    let cat_estatus_test = document.getElementById('cat_estatus_test').value.trim();

    if (validarData(cat_test_bas,'Seleccion el tipo de test') &&
    validarData(cat_estatus_test,'Seleccione el estatus')
    ){
        agregarEditarByDbByJuguete();
    }
}