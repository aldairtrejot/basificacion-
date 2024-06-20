<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Selectpicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>

</head>

<body>
    <select class="selectpicker" id="miSelect" data-live-search="true">
        <option value="1">Opción 1</option>
        <option value="2">Opción 2</option>
        <option value="3">Opción 3</option>
    </select>

</body>
<script>
    // Espera a que el documento esté completamente cargado
    $(document).ready(function () {
        // Inicializa el selectpicker
        $('#miSelect').selectpicker();

        // Agrega un listener para el evento change del selectpicker
        $('#miSelect').on('change', function () {
            var valorSeleccionado = $(this).val(); // Obtiene el valor seleccionado
            console.log('Valor seleccionado:', valorSeleccionado);

            // Aquí puedes realizar acciones adicionales según el valor seleccionado
            // Por ejemplo, mostrar un mensaje o realizar una solicitud AJAX
        });
    });
</script>

</html>