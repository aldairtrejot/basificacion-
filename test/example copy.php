<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pestañas de Navegación con Línea Debajo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-tabs .nav-link {
            position: relative;
            color: #007bff;
            padding: 10px 15px;
            border: none;
            background: none;
            text-decoration: none;
            font-weight: 500;
        }

        .custom-tabs .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -1px;
            left: 0;
            background-color: transparent;
            transition: background-color 0.25s ease;
        }

        .custom-tabs .nav-link:hover::after,
        .custom-tabs .nav-link.active::after {
            background-color: #007bff;
        }

        .custom-tabs .nav-link.active {
            color: #0056b3;
        }

        .custom-tabs .nav-link:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab"
                    aria-controls="services" aria-selected="false">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                    aria-selected="false">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Contacto</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Contenido de
                Inicio</div>
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">Contenido de
                Servicios</div>
            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">Contenido de Acerca de
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contenido de Contacto
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>