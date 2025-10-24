<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portafolio - Desarrollador</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#inicio">
                <i class="fas fa-code"></i> Mi Portafolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experiencia">Mi Experiencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#proyectos">Proyectos Públicos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección Inicio -->
    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-3">
                            Hola, Soy <span class="text-primary">Desarrollador</span>
                        </h1>
                        <p class="lead mb-4">
                            Desarrollador Full Stack especializado en crear aplicaciones web modernas y escalables.
                            Apasionado por la tecnología y siempre en busca de nuevos desafíos.
                        </p>
                        <div class="hero-buttons">
                            <a href="#proyectos" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-eye"></i> Ver Proyectos
                            </a>
                            <a href="#experiencia" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-user"></i> Mi Experiencia
                            </a>
                        </div>
                        <div class="social-links mt-4">
                            <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <div class="code-animation">
                            <i class="fas fa-code fa-10x text-primary opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Mi Experiencia -->
    <section id="experiencia" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5">Mi Experiencia</h2>
                </div>
            </div>
            
            <!-- Habilidades técnicas -->
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h3 class="mb-4">Habilidades Técnicas</h3>
                    <div class="skill-item mb-3">
                        <div class="d-flex justify-content-between">
                            <span>PHP</span>
                            <span>90%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-item mb-3">
                        <div class="d-flex justify-content-between">
                            <span>JavaScript</span>
                            <span>85%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item mb-3">
                        <div class="d-flex justify-content-between">
                            <span>MySQL</span>
                            <span>80%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="skill-item mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Bootstrap</span>
                            <span>95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Experiencia Profesional</h3>
                    <div class="experience-item mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Desarrollador Full Stack</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Empresa ABC • 2022 - Presente</h6>
                                <p class="card-text">
                                    Desarrollo de aplicaciones web utilizando PHP, MySQL y JavaScript.
                                    Implementación de sistemas escalables y mantenimiento de código legacy.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="experience-item mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Desarrollador Junior</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tech Solutions • 2020 - 2022</h6>
                                <p class="card-text">
                                    Colaboración en proyectos de desarrollo web, aprendizaje de mejores prácticas
                                    y participación en el ciclo completo de desarrollo de software.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Proyectos Públicos -->
    <section id="proyectos" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5">Proyectos Públicos</h2>
                </div>
            </div>
            
            <div class="row" id="proyectos-container">
                <!-- Los proyectos se cargarán dinámicamente con JavaScript -->
            </div>
            
            <!-- Botón para cargar más proyectos -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button id="cargar-mas" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i> Cargar Más Proyectos
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> Mi Portafolio. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>Desarrollado con <i class="fas fa-heart text-danger"></i> y PHP</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript personalizado -->
    <script src="assets/js/main.js"></script>
</body>
</html>