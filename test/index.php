<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Barras con Colores Verde y Gris</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4">Gráfico de Barras Verde y Gris</h1>
        <div class="row">
            <div class="col-md-12">
                <canvas id="myBarChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Chart.js Script -->
    <script>
        // Configuración del gráfico de barras
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico: 'bar' para gráfico de barras
            data: {
                labels: [
                    'Campo 1', 'Campo 2', 'Campo 3', 'Campo 4', 
                    'Campo 5', 'Campo 6', 'Campo 7', 'Campo 8', 
                    'Campo 9', 'Campo 10', 'Campo 11', 'Campo 12', 
                    'Campo 13', 'Campo 14', 'Campo 15', 'Campo 16'
                ], // Etiquetas de las barras
                datasets: [{
                    label: 'Distribución de Campos',
                    data: [5, 10, 8, 12, 7, 6, 4, 15, 9, 11, 13, 14, 16, 18, 20, 22], // Datos para cada barra
                    backgroundColor: [ // Colores para cada barra
                        '#4CAF50', '#8BC34A', '#C5E1A5', '#DCEDC8',
                        '#9E9E9E', '#BDBDBD', '#E0E0E0', '#F5F5F5',
                        '#43A047', '#66BB6A', '#81C784', '#A5D6A7',
                        '#607D8B', '#78909C', '#90A4AE', '#B0BEC5'
                    ],
                    borderColor: '#fff', // Color del borde de las barras
                    borderWidth: 1 // Ancho del borde
                }]
            },
            options: {
                responsive: true, // Hace que el gráfico sea responsive
                plugins: {
                    legend: {
                        position: 'top', // Posición de la leyenda
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw; // Personaliza el texto del tooltip
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true, // El eje X comienza en 0
                        title: {
                            display: true,
                            text: 'Campos' // Título del eje X
                        }
                    },
                    y: {
                        beginAtZero: true, // El eje Y comienza en 0
                        title: {
                            display: true,
                            text: 'Valores' // Título del eje Y
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
