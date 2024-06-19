///ARCHIVOS JS PARA EL MODULO DE JUUETES O TABLA ctrl_juguetes

    ///LA FUNCION VALIDA QUE UN DEPENDIENTE ECONOMICO CON LA FECHA QUE SE SELECCIONA, 
    ///NO SE ENCUENTRE DENTRO DE LA TABLA CTRL_JUGUETES, SI SE ENCUENTRA EL REGISTRO
    ///DENTRO DE LA TABLA SE RETORNA VERDADERO, DE LO CONTRARIO FALSO.
    function validateDependienteInJuguetes(arraJS,idFecha,idDependiente) {
        let bool = false;
        let array = arraJS;
        for (let i = 0; i < array.length; i+=3) {
            if (array[i] == idFecha && array[i + 1] == idDependiente) {
                bool = true;
            }
        }
        return bool;
    }

    /// SIMILAR A LA FUNCION SIN LA SOBRECARGA DE PARAMETROS, PERO SIRVE PARA MODIFICAR
    function validateDependienteInJuguetesEdit(arraJS,idFecha,idDependiente,idCtrlJuguete) {
        let bool = false;
        let array = arraJS;
        for (let i = 0; i < array.length; i+=3) {
            if (array[i] == idFecha && array[i + 1] == idDependiente && array[i + 2] != idCtrlJuguete) {
                console.log ('Fecha: ' + array[i] + ' -Dependiete: ' + array[i + 1] + ' -idJuguete: ' + array[i + 2] + " != " + idCtrlJuguete);
                bool = true;
            }
        }
        return bool;
    }