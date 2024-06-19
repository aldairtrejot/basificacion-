function validarEspecialidad(){
    let id_cat_especialidad_hraes = document.getElementById('id_cat_especialidad_hraes').value.trim();

    if (validarData(id_cat_especialidad_hraes,'Especialidad')
    ){
        guardarCedula();
    }
}
                            

