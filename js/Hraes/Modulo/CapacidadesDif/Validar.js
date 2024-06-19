function validarCaopacidad(){
    let id_cat_capacidad_dif_hraes = document.getElementById('id_cat_capacidad_dif_hraes').value;

    if (validarData(id_cat_capacidad_dif_hraes,'Capacidad diferente')){
        agregarEditarByDbByCapacidad();
    }
}
