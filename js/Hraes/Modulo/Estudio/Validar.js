function validarEstudio(){
    let id_cat_nivel_estudios = document.getElementById('id_cat_nivel_estudios').value.trim();
    let id_cat_carrera_hraes = document.getElementById('id_cat_carrera_hraes').value.trim();
    let carrera_ca = document.getElementById('carrera_ca').value.trim();
    let cedula_ca = document.getElementById('cedula_ca').value.trim();

    if (validarData(id_cat_nivel_estudios,'Nivel de estudio') &&
    validarData(id_cat_carrera_hraes,'Carrera') &&
    validarData(cedula_ca,'Cédula profesional') &&
    caracteresCount('Cédula profesional',20,cedula_ca)
    ){
        if (id_cat_carrera_hraes == 160){
            if (validarData(carrera_ca,'Especifique la carrera')){
                guardarEstudio();
            }
        } else {
            guardarEstudio();
        }
        
    }
}
                            

document.getElementById('id_cat_carrera_hraes').addEventListener('change', function() {
    let value = this.value;
    
    if (value == 160){
        mostrarContenido('ocultar_carrera'); 
    } else {
        ocultarContenido('ocultar_carrera');
    }
  });



