
function mensajeErrorOK(text) {
  return Swal.fire({
      icon: "error",
      title: "Ocurrio Algo",
      text: text
  });
}

function mensajeExito(text){
   const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  return Toast.fire({
    icon: "success",
    title: text
  });
}

function mensajeError(text){
  const Toast = Swal.mixin({
   toast: true,
   position: "top-end",
   showConfirmButton: false,
   timer: 3000,
   timerProgressBar: true,
   didOpen: (toast) => {
     toast.onmouseenter = Swal.stopTimer;
     toast.onmouseleave = Swal.resumeTimer;
   }
 });
 return Toast.fire({
   icon: "error",
   title: text
 });
}

function confirmarEliminar(){
 return Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      return true;
    }
  });
}


function validarNull(cadena){
  let bool = false;
  if(cadena.length === 0){
      bool = true;
  }
  return bool;
} 

function validarData(data, text){
  let bool = true;
  if (validarNull(data)){
      mensajeError('Campo '+ text + '* no puede estar vacio.');
      bool = false;
  } 
  return bool;
}

function messageErrorLarge(text){
  Swal.fire({
      icon: "error",
      title: "Oops...",
      text: text,
    });
}