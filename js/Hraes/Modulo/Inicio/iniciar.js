function buscarInfoEmpleado(id_tbl_empleados_hraes){
    let nombreResult = document.getElementById("nombreResult");
    let numEmpleadoResult = document.getElementById("numEmpleadoResult");
    let curpResult = document.getElementById("curpResult");
    let rfcResult = document.getElementById("rfcResult");

    let puestoResult = document.getElementById("puestoResult");
    let nivelResult = document.getElementById("nivelResult");

    let numPlazaResult = document.getElementById("numPlazaResult");
    
    $.post('../../../../App/Controllers/Hrae/EmpleadoC/InformacionC.php', {
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let nombre = jsonData.nombre;
            let curp = jsonData.curp;
            let rfc = jsonData.rfc;
            let noEmpleado = jsonData.noEmpleado;

            let plaza = jsonData.plaza;

            let nivel = jsonData.nivel;
            let puesto = jsonData.puesto;

            nombreResult.textContent = nombre;
            numEmpleadoResult.textContent = noEmpleado;
            curpResult.textContent = curp;
            rfcResult.textContent = rfc;

            puestoResult.textContent = puesto;
            nivelResult.textContent = nivel;

            numPlazaResult.textContent = plaza;
        }
    );
}

function iniciarEscolaridad(){
    buscarEstudio();
    //buscarCedula();
    buscarEspecialidad();
}

function iniciarMediosContacto(){
    mensajetextLar('El usuario debe verificar que todos los campos estén completos, incluyendo el domiclio (código postal fiscal) y la forma de pago (cuenta clabe).');
    buscarNumTelefonico();
    buscarCorreo();
    buscarDependiente();
    buscarEmergencia();
}

function iniciarMovimiento(){
    buscarMovimiento();
   // buscarJefe();
    iniciarAdicional();
}

function iniciarPersonalBancario(){
    buscarFormaPago();
    buscarJefe();
    iniciarDomicilio();
    buscarCapacidadesDif();
}

function iniciarProgramas(){
    
    //iniciarCampos();
}

function iniciarIncidencias(){
    buscarRetardo();
    //buscarJuguete();
    //buscarPercepcion();
}

function iniciarPercepciones(){
    
    buscarQuinquenio();
}

function convertirAMayusculas(event, inputId) {
    let inputElement = document.getElementById(inputId);
    let texto = event.target.value;
    let textoEnMayusculas = texto.toUpperCase();
    inputElement.value = textoEnMayusculas;
  }

  function validarNumero(input) {
    input.value = input.value.replace(/[^\d]/g, '');
  }