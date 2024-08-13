@extends('layout.plantilla')
@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Regional</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body.dark-mode {
            background-color: #343a40;
            color: #ffffff;
        }
        .dark-mode .jumbotron {
            background-color: #343a40;
            color: #ffffff;
        }
        .dark-mode .bg-light {
            background-color: #6c757d !important;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header class="bg-primary text-white text-center py-3">
        <h1>Bienvenido al Hospital Regional Docente de Trujillo</h1>
    </header>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Hospital RDT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de bienvenida -->
    <section id="inicio" class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h2 class="display-4">Tu salud, nuestra prioridad</h2>
            <p class="lead">Ofrecemos una atención médica de calidad con los mejores profesionales.</p>
            <a class="btn btn-primary btn-lg" href="#servicios" role="button">Nuestros Servicios</a>
        </div>
    </section>

    <!-- Sección de servicios -->
    <section id="servicios" class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Nuestros Servicios</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/emergencias.jpg" class="card-img-top" alt="Emergencias">
                        <div class="card-body">
                            <h5 class="card-title">Emergencias</h5>
                            <p class="card-text">Atención inmediata las 24 horas del día.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/consulta.jpg" class="card-img-top" alt="Consulta Médica">
                        <div class="card-body">
                            <h5 class="card-title">Consulta Médica</h5>
                            <p class="card-text">Consultas con especialistas en todas las áreas de la medicina.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/laboratorio.jpg" class="card-img-top" alt="Laboratorio">
                        <div class="card-body">
                            <h5 class="card-title">Laboratorio</h5>
                            <p class="card-text">Análisis clínicos con tecnología de punta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de contacto -->
    <section id="contacto" class="py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-4">Contacto</h3>
            <div class="row">
                <div class="col-md-6">
                    <h5>Dirección:</h5>
                    <p>Av. Mansiche 795, Trujillo 13011</p>
                    <h5>Teléfono:</h5>
                    <p>(044) 481200</p>
                    <h5>Email:</h5>
                    <p>info@hospitalRDT.com</p>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingresa tu email">
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="3" placeholder="Escribe tu mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection
