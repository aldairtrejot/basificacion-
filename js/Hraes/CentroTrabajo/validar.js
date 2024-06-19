function validar(){

    let nombre = document.getElementById('nombre').value.trim();
    let clave_centro_trabajo = document.getElementById('clave_centro_trabajo').value.trim();
    let colonia = document.getElementById('colonia').value.trim();
    let id_cat_region = document.getElementById('id_cat_region').value.trim();
    let id_estatus_centro = document.getElementById('id_estatus_centro').value.trim();
    let id_cat_entidad = document.getElementById('id_cat_entidad').value.trim();
    let codigo_postal = document.getElementById('codigo_postal').value.trim();

    let latitud = document.getElementById('latitud').value.trim();
    let longitud = document.getElementById('longitud').value.trim();

    if (validarData(nombre,'Nombre') &&
        validarData(clave_centro_trabajo,'Clave centro de trabajo') &&
        validarData(id_cat_region,'Región') &&
        validarData(id_estatus_centro,'Estatus') &&
        validarData(id_cat_entidad,'Entidad')&&
        validarData(latitud,'Latitud')&&
        validarData(longitud,'Longitud')&&
        validarData(codigo_postal,'Código postal') &&
        caracteresCount('Código postal',5,codigo_postal)
    ){
        agregarEditarByDb();
    } 
}

