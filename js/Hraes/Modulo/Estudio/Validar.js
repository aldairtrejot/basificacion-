function validarEstudio(){
    let id_cat_nivel_estudios = document.getElementById('id_cat_nivel_estudios').value.trim();

    if (validarData(id_cat_nivel_estudios,'Nivel de estudio')
    ){
        guardarEstudio();
    }
}
                            

