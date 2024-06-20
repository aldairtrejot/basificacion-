$(document).ready(function () {
    //centroTrabajoHraes();
   // plazasHraes();
    empleadosHraes();
});

function empleadosHraes(){
    let empleadosR = document.getElementById("empleadosR");
    let masculinoR = document.getElementById("masculinoR");
    let femeninoR = document.getElementById("femeninoR");

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/InicioC.php", {},
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);
            let empleados = jsonData.empleados;
            let masculino = jsonData.masculino;
            let femenino = jsonData.femenino;

            empleadosR.textContent = empleados;
            masculinoR.textContent = masculino;
            femeninoR.textContent = femenino;

        var data = {
            labels: ["Masculino", "Femenino"],
            datasets: [{
                label: "Colores",
                data: [masculino,femenino],
                backgroundColor: ["#9fd8a3","#e2e2e2"]
            }]
        };

        var options = {
            plugins: {
                legend: {
                    display: false 
                },
                title: {
                    display: true,
                    text: 'Distribución por género',
                    font: {
                        size: 15 
                    }
                }
            },
            cutout: '50%'
        };

        var ctx = document.getElementById('myChartEmpleados').getContext('2d');
        var myChartEmpleados = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options,
        });
    }); 
}

function plazasHraes(){
    let allPlazasR = document.getElementById("allPlazasR");
    let bloqueadaR = document.getElementById("bloqueadaR");
    let canceladaR = document.getElementById("canceladaR");
    let ocupadaR = document.getElementById("ocupadaR");
    let reservadaR = document.getElementById("reservadaR");
    let vacanteR = document.getElementById("vacanteR");
    let congeladaR = document.getElementById("congeladaR");
    let vacanteIndef = document.getElementById("vacanteIndef");

    $.post("../../../../App/Controllers/Hrae/PlazasC/InicioC.php", {},
        function (data) {
            let jsonData = JSON.parse(data);

            let allPlazas = jsonData.allPlazas;
            let bloqueada = jsonData.bloqueada;
            let cancelada = jsonData.cancelada;
            let ocupada = jsonData.ocupada;
            let reservada = jsonData.reservada;
            let vacante = jsonData.vacante;
            let congelada = jsonData.congelada;
            let indefinida = jsonData.indefinida;

            allPlazasR.textContent = allPlazas;
            bloqueadaR.textContent = bloqueada;
            canceladaR.textContent = cancelada;
            ocupadaR.textContent = ocupada;
            reservadaR.textContent = reservada;
            vacanteR.textContent = vacante;
            congeladaR.textContent = congelada;
            vacanteIndef.textContent = indefinida;

        var data = {
            labels: ["Bloqueada", "Cancelada", "Ocupada", "Reservada", "Vacante", "Congelada", "Vacante no definida" ],
            datasets: [{
                label: "Colores",
                data: [bloqueada,cancelada,ocupada,reservada,vacante,congelada,indefinida],
                backgroundColor: ["#e2e2e2", "#dbe5ab", "#747874","#062107","#9fd8a3","#5f6c62", "#89b399"]
            }]
        };

        var options = {
            plugins: {
                legend: {
                    display: false 
                },
                title: {
                    display: true,
                    text: 'Distribución por tipo de plaza',
                    font: {
                        size: 15 
                    }
                }
            },
            cutout: '50%'
        };

        var ctx = document.getElementById('myChartPlazas').getContext('2d');
        var myChartPlazas = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options,
        });
    }); 
}

function centroTrabajoHraes(){
    let totalCTR = document.getElementById("totalCTR");
    let rCentroR = document.getElementById("rCentroR");
    let rSurR = document.getElementById("rSurR");
    let rNorteR = document.getElementById("rNorteR");
    let rMetropolitanoR = document.getElementById("rMetropolitanoR");
    let rCorporativoR = document.getElementById("rCorporativoR");

    $.post("../../../../App/Controllers/Hrae/CentroTrabajoC/InicioC.php", {},
        function (data) {
            let jsonData = JSON.parse(data);
            
            let rCentro = jsonData.rCentro;
            let rSur = jsonData.rSur;
            let rNorte = jsonData.rNorte;
            let rMetropolitano = jsonData.rMetropolitano;
            let rCorporativo = jsonData.rCorporativo;

            totalCTR.textContent = jsonData.totalCT;
            rCentroR.textContent = rCentro;
            rSurR.textContent = rSur;
            rNorteR.textContent = rNorte;
            rMetropolitanoR.textContent = rMetropolitano;
            rCorporativoR.textContent = rCorporativo;
            
            var data = {
                labels: ["Regional Centro", "Regional Sur", "Regional Norte", "Regional Metropolitana", "Corporativo"],
                datasets: [{
                    label: "Colores",
                    data: [rCentro, rSur, rNorte,rMetropolitano,rCorporativo],
                    backgroundColor: ["#9fd8a3", "#dbe5ab", "#062107","#747874","#e2e2e2"]
                }]
            };
    
            var options = {
                plugins: {
                    legend: {
                        display: false 
                    },
                    title: {
                        display: true,
                        text: 'Distribución por regiones',
                        font: {
                            size: 15 
                        }
                    }
                },
                cutout: '50%'
            };
    
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
            
        }
    );
}


document.addEventListener('DOMContentLoaded', function () {
    tippy('#button_cat', {
      content: 'Cat\u00e1logo.',
      theme: 'green',
    });
  });