function validar(){
    let nombre = document.getElementById('nombre').value.trim();
    let rfc = document.getElementById('rfc').value.trim();
    let primer_apellido = document.getElementById('primer_apellido').value.trim();
    let curp = document.getElementById('curp').value.trim();
    let num_empleado = document.getElementById('num_empleado').value.trim();
    let id_cat_pais_nacimiento = document.getElementById('id_cat_pais_nacimiento').value.trim();
    //let pais_nacimiento = document.getElementById('pais_nacimiento').value.trim();
    //let id_cat_genero = document.getElementById('id_cat_genero').value.trim();
    let id_cat_estado_civil = document.getElementById('id_cat_estado_civil').value.trim();
    let id_object = document.getElementById('id_object').value;
    let nss = document.getElementById('nss').value;
    let nacionalidad = document.getElementById('nacionalidad').value;
    
    if (validarData(nombre,'Nombre') &&
        validarData(rfc,'Rfc') &&
        validarData(primer_apellido,'Apellido paterno') &&
        validarData(curp,'Curp') &&
        validarData(num_empleado,'Num. empleado') &&
        validarData(id_cat_pais_nacimiento,'País de nacimiento') &&
        validarData(nacionalidad,'Nacionalidad') &&
        validarData(id_cat_estado_civil,'Estado civil') &&
        campoInvalido(validarCurp(curp),'Curp') &&
        campoInvalido(validarRFC(rfc),'Rfc') &&
        caracteresCount('Núm. de seguro social',12,nss)
    ){
        validarUnique(rfc,curp,num_empleado,id_object);
    }
}


function validarUnique(rfc,curp,numEmpleado,id_object){
    $.post("../../../../App/Controllers/Hrae/EmpleadoC/ValidarC.php", {
        rfc: rfc,
        curp:curp,
        numEmpleado:numEmpleado,
        id_object:id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let bool = jsonData.bool; 
            let message = jsonData.message;
            
            if(bool){
                agregarEditarByDb();
            } else {
                mensajeError(message);
            }
        }
    );
}

function obtenerGenero(){
    let curp = document.getElementById('curp').value.trim();
    let textoEnMayusculas = curp.toUpperCase();
    document.getElementById("curp").value = textoEnMayusculas;

    $("#genero_x").val(generoCurp(curp));
    $("#fecha_x_na").val(obtenerFechaNacimiento(curp));
    $("#edad_x_s").val(diferenciaEntreFechas(obtenerFechaNacimiento(curp),'2024-06-22'));
}

function diferenciaEntreFechas(fechaInicio, fechaFin) {
    // Convertir las fechas a objetos Date
    if (validarFecha(fechaInicio)){
    let inicio = new Date(fechaInicio);
    let fin = new Date(fechaFin);

    // Verificar si fechaInicio es mayor que fechaFin
    if (inicio > fin) {
        // Si fechaInicio es mayor, intercambiamos las fechas
        let temp = inicio;
        inicio = fin;
        fin = temp;
    }

    // Calcular la diferencia en años y meses
    let anios = fin.getFullYear() - inicio.getFullYear();
    let meses = fin.getMonth() - inicio.getMonth();

    // Ajustar si la diferencia de meses es negativa
    if (meses < 0) {
        anios--;
        meses += 12; // Sumamos 12 meses para convertir a positivo
    }

    // Retornar la diferencia en años y meses
   // return { anios: anios, meses: meses };
   return anios + " años y " + meses + " meses";   
} else {
        return 'NO ENCONTRADO';
    }
}

function validarFecha(fechaString) {
    // Intentar crear un objeto Date a partir de la cadena de fecha
    let fecha = new Date(fechaString);

    // Verificar si el objeto Date es válido
    // y si la fecha obtenida es igual a la fecha ingresada
    if (
        isNaN(fecha.getTime()) // Verifica si es un valor de fecha válido
        || fecha.toISOString().slice(0, 10) !== fechaString // Verifica si la fecha obtenida es igual a la fecha ingresada
    ) {
        return false;
    }

    return true;
}

function generoCurp(curp){
    let result = curp.substring(10, 11);
    let message = 'NO ENCONTRADO';

    if(result.toUpperCase() == 'M'){
        message = 'FEMENINO';
    } else if (result.toUpperCase() == 'H'){
        message = 'MASCULINO';
    } else if (result.toUpperCase() == 'X'){
        message = 'OTRO';
    }
    return message;
}


function obtenerFechaNacimiento(curp) {
    let mensaje = '';
    // Validar que la CURP tenga al menos 10 caracteres
    if (curp.length < 10) {
        mensaje =  ''; // Retorna cadena vacía si la CURP es demasiado corta
    }

    // Extraer los primeros 10 caracteres que contienen la fecha de nacimiento (YYMMDD)
    let fechaNacimientoYYMMDD = curp.substring(4, 10);

    // Verificar que los caracteres de fecha de nacimiento (YYMMDD) sean numéricos
    if (!/^\d+$/.test(fechaNacimientoYYMMDD)) {
        mensaje = ''; // Retorna cadena vacía si no son todos números
    }

    // Obtener los componentes de la fecha (año, mes, día)
    let year = parseInt(fechaNacimientoYYMMDD.substring(0, 2), 10);
    let month = parseInt(fechaNacimientoYYMMDD.substring(2, 4), 10);
    let day = parseInt(fechaNacimientoYYMMDD.substring(4, 6), 10);

    // Convertir el año a formato completo (agregando el siglo según la posición del primer número)
    if (year >= 0 && year <= 19) {
        year += 2000; // Años 00 a 19 corresponden a 2000 a 2019
    } else {
        year += 1900; // Años 20 a 99 corresponden a 1920 a 1999
    }

    // Validar que la fecha de nacimiento obtenida sea válida
    if (isNaN(year) || isNaN(month) || isNaN(day)) {
        mensaje = ''; // Retorna cadena vacía si no se pudo determinar una fecha válida
    }

    // Retornar la fecha de nacimiento en formato objeto con día, mes y año
    /*
    return {
        dia: day,
        mes: month,
        anio: year
    };*/

    mensaje = year + '-' + addCero(month) + '-' + addCero(day);
    return mensaje;
}

function addCero(value){
    if (value < 10){
        value = '0' + value;
    }
    return value;
}

/*
document.getElementById("id_cat_pais_nacimiento").addEventListener("change", function() {
    let id_cat_pais_nacimiento = this.value;
    $.post("../../../../App/Controllers/Hrae/EmpleadoC/EstadoC.php", {
        id_cat_pais_nacimiento: id_cat_pais_nacimiento,
    },
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);
            let estado = jsonData.estado; 

            $('#id_cat_estado_nacimiento').empty();
            $('#id_cat_estado_nacimiento').html(estado); 
            $('#id_cat_estado_nacimiento').selectpicker('refresh');
            $('.selectpicker').selectpicker 
        }
    );
  });
  */



   

  document.addEventListener("DOMContentLoaded", function() {

    var select = document.getElementById("id_cat_pais_nacimiento");
    select.addEventListener("change", function() {
        $.post("../../../../App/Controllers/Hrae/EmpleadoC/EstadoC.php", {
            id_cat_pais_nacimiento: select.value,
        },
            function (data) {
                let jsonData = JSON.parse(data);
                let estado = jsonData.estado; 
    
                $('#id_cat_estado_nacimiento').empty();
                $('#id_cat_estado_nacimiento').html(estado); 
                $('#id_cat_estado_nacimiento').selectpicker('refresh');
                //$('.selectpicker').selectpicker 
            }
        );
    });
  });


