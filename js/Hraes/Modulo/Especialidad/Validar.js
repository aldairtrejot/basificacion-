function validarEspecialidad(){
    let id_cat_especialidad_hraes = document.getElementById('id_cat_especialidad_hraes').value.trim();
    let cedula_esp = document.getElementById('cedula_esp').value.trim();
    let otro_especialidad = document.getElementById('otro_especialidad').value.trim();

    if (id_cat_especialidad_hraes == 233){
        if (validarData(id_cat_especialidad_hraes,'Especialidad') &&
            validarData(otro_especialidad,'Otra especialidad') &&
            validarData(cedula_esp,'Cédula profesional') &&
          caracteresCount('Cédula profesional',20,cedula_esp)
    ){
        guardarCedula();
    }
    } else {
        if (validarData(id_cat_especialidad_hraes,'Especialidad') &&
        validarData(cedula_esp,'Cédula profesional') &&
            caracteresCount('Cédula profesional',20,cedula_esp)
        ){
            guardarCedula();
        }
    }
    
}
               

document.getElementById('id_cat_especialidad_hraes').addEventListener('change', function() {
    let value = this.value;
    
    if (value == 233){
        mostrarContenido('ocultar_cedula_esp'); 
    } else {
        ocultarContenido('ocultar_cedula_esp');
    }
  });

