
function validarPercepcion(){
    let id_cat_concepto = document.getElementById('id_cat_concepto').value;
    let id_cat_valores = document.getElementById('id_cat_valores').value;
    let id_object = document.getElementById('id_object').value;

    if (validarData(id_cat_concepto,'Concepto') &&
        validarData(id_cat_valores,'Valor') 
    ){
        validarConcepto(id_cat_concepto,id_tbl_empleados_hraes,id_object);
    }

}

function handleChange(event){
    let selectedOption = event.target.options[event.target.selectedIndex];
    let id_cat_concepto = selectedOption.value;

    $.post("../../../../App/Controllers/Hrae/PercepcionesC/ConceptoC.php", {
        id_cat_concepto: id_cat_concepto,
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let valor = jsonData.valor; 
            
            $('#id_cat_valores').empty();
            $('#id_cat_valores').html(valor)
        
        }
    );
}

function validarConcepto(id_cat_concepto,id_tbl_empleados_hraes,id_object){
    $.post("../../../../App/Controllers/Hrae/PercepcionesC/ValidarConceptoC.php", {
        id_cat_concepto: id_cat_concepto,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
        id_object:id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let message = jsonData.message; 
            let bool = jsonData.bool;

            if (!bool){
                agregarEditarByDbByPercepcion();
            } else {
                mensajeError(message);
            }
        }
    );
}

