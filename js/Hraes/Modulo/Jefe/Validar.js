function validarJefe(){
    let id_cat_lengua_idioma = document.getElementById('id_cat_lengua_idioma').value.trim();

    if (validarData(id_cat_lengua_idioma,'Seleccione el idioma o lengua')
    ){
        guardarJefe();
    }
}
                            

