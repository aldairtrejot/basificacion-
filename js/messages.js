//MESSAGE ERROR
function messajeError(text) {
    return Swal.fire({
        icon: "error",
        title: "Ocurrio Algo",
        text: text
    });
}

function validarData(data, text){
    let bool = true;
    if (validarNull(data)){
        mensajeError('Campo '+ text + '* no puede estar vacio.');
        bool = false;
    } 
    return bool;
  }