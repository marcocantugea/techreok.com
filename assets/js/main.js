// JavaScript principal para el portafolio

document.addEventListener('DOMContentLoaded', function() {
    
    // Datos de proyectos (simulando una API)
    const proyectos = [
        {
            id: 1,
            titulo: 'Sistema de Gestión de Inventario',
            descripcion: 'Aplicación web completa para gestionar inventarios con PHP y MySQL. Incluye funcionalidades de CRUD, reportes y autenticación de usuarios.',
            tecnologias: ['PHP', 'MySQL', 'Bootstrap', 'JavaScript'],
            imagen: 'fas fa-boxes',
            github: 'https://github.com/usuario/inventario',
            demo: 'https://demo-inventario.com'
        },
        {
            id: 2,
            titulo: 'API REST con PHP',
            descripcion: 'API RESTful desarrollada en PHP puro para manejar operaciones CRUD. Incluye autenticación JWT y documentación completa.',
            tecnologias: ['PHP', 'JSON', 'JWT', 'MySQL'],
            imagen: 'fas fa-server',
            github: 'https://github.com/usuario/api-rest',
            demo: null
        },
        {
            id: 3,
            titulo: 'Dashboard Administrativo',
            descripcion: 'Panel de administración responsive con gráficos interactivos, tablas dinámicas y sistema de roles de usuario.',
            tecnologias: ['PHP', 'Chart.js', 'Bootstrap', 'MySQL'],
            imagen: 'fas fa-chart-line',
            github: 'https://github.com/usuario/dashboard',
            demo: 'https://demo-dashboard.com'
        },
        {
            id: 4,
            titulo: 'Sistema de Blog',
            descripcion: 'Plataforma de blog con sistema de comentarios, categorías, etiquetas y panel de administración completo.',
            tecnologias: ['PHP', 'MySQL', 'TinyMCE', 'Bootstrap'],
            imagen: 'fas fa-blog',
            github: 'https://github.com/usuario/blog',
            demo: 'https://demo-blog.com'
        },
        {
            id: 5,
            titulo: 'E-commerce Básico',
            descripcion: 'Tienda online con carrito de compras, sistema de pagos integrado y panel de administración para productos.',
            tecnologias: ['PHP', 'MySQL', 'PayPal API', 'JavaScript'],
            imagen: 'fas fa-shopping-cart',
            github: 'https://github.com/usuario/ecommerce',
            demo: 'https://demo-shop.com'
        },
        {
            id: 6,
            titulo: 'Sistema de Reservas',
            descripcion: 'Aplicación para gestionar reservas de citas con calendario interactivo, notificaciones por email y confirmaciones.',
            tecnologias: ['PHP', 'FullCalendar.js', 'MySQL', 'PHPMailer'],
            imagen: 'fas fa-calendar-alt',
            github: 'https://github.com/usuario/reservas',
            demo: null
        }
    ];

    let proyectosMostrados = 0;
    const proyectosPorPagina = 3;

    // Inicializar la aplicación
    init();

    function init() {
        // Configurar navegación suave
        setupSmoothScrolling();
        
        // Configurar navbar activo
        setupActiveNavbar();
        
        // Animar barras de progreso
        animateProgressBars();
        
        // Cargar proyectos iniciales
        cargarProyectos();
        
        // Configurar botón de cargar más
        setupCargarMas();
        
        // Configurar animaciones de entrada
        setupScrollAnimations();
    }

    // Navegación suave
    function setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 70; // Altura del navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Navbar activo según scroll
    function setupActiveNavbar() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    }

    // Animar barras de progreso cuando entren en vista
    function animateProgressBars() {
        const progressBars = document.querySelectorAll('.progress-bar');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target;
                    const width = progressBar.style.width;
                    progressBar.style.width = '0%';
                    setTimeout(() => {
                        progressBar.style.width = width;
                    }, 100);
                }
            });
        });

        progressBars.forEach(bar => observer.observe(bar));
    }

    // Cargar proyectos
    function cargarProyectos() {
        const container = document.getElementById('proyectos-container');
        const proyectosAMostrar = proyectos.slice(proyectosMostrados, proyectosMostrados + proyectosPorPagina);

        proyectosAMostrar.forEach((proyecto, index) => {
            setTimeout(() => {
                const proyectoElement = createProyectoElement(proyecto);
                container.appendChild(proyectoElement);
                
                // Animar entrada
                setTimeout(() => {
                    proyectoElement.classList.add('visible');
                }, 100);
            }, index * 200);
        });

        proyectosMostrados += proyectosAMostrar.length;
        
        // Ocultar botón si no hay más proyectos
        const botonCargarMas = document.getElementById('cargar-mas');
        if (proyectosMostrados >= proyectos.length) {
            botonCargarMas.style.display = 'none';
        }
    }

    // Crear elemento de proyecto
    function createProyectoElement(proyecto) {
        const col = document.createElement('div');
        col.className = 'col-lg-4 col-md-6 mb-4 fade-in';

        const tecnologiasHTML = proyecto.tecnologias.map(tech => 
            `<span class="project-tag">${tech}</span>`
        ).join('');

        const demoButton = proyecto.demo ? 
            `<a href="${proyecto.demo}" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-external-link-alt"></i> Demo
            </a>` : '';

        col.innerHTML = `
            <div class="card project-card border-0 shadow-sm h-100">
                <div class="project-image">
                    <i class="${proyecto.imagen}"></i>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">${proyecto.titulo}</h5>
                    <p class="card-text flex-grow-1">${proyecto.descripcion}</p>
                    <div class="project-tags">
                        ${tecnologiasHTML}
                    </div>
                    <div class="project-buttons">
                        <a href="${proyecto.github}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                        ${demoButton}
                    </div>
                </div>
            </div>
        `;

        return col;
    }

    // Configurar botón cargar más
    function setupCargarMas() {
        const boton = document.getElementById('cargar-mas');
        boton.addEventListener('click', function() {
            // Mostrar loading
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="loading"></span> Cargando...';
            this.disabled = true;

            // Simular carga
            setTimeout(() => {
                cargarProyectos();
                this.innerHTML = originalText;
                this.disabled = false;
            }, 1000);
        });
    }

    // Animaciones de scroll
    function setupScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observar elementos que deben animarse
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    }

    // Funciones utilitarias
    function showNotification(message, type = 'info') {
        // Crear elemento de notificación
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(notification);

        // Auto-remover después de 5 segundos
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }

    // Funciones para formularios futuros
    function validateForm(formData) {
        const errors = [];
        
        if (!formData.get('nombre') || formData.get('nombre').trim().length < 2) {
            errors.push('El nombre debe tener al menos 2 caracteres');
        }
        
        if (!formData.get('email') || !isValidEmail(formData.get('email'))) {
            errors.push('Ingrese un email válido');
        }
        
        if (!formData.get('mensaje') || formData.get('mensaje').trim().length < 10) {
            errors.push('El mensaje debe tener al menos 10 caracteres');
        }
        
        return errors;
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Exponer funciones globales si es necesario
    window.PortfolioApp = {
        showNotification,
        validateForm,
        isValidEmail
    };

    // Easter egg - Konami Code
    let konamiCode = [];
    const konamiSequence = [
        'ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown',
        'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight',
        'KeyB', 'KeyA'
    ];

    document.addEventListener('keydown', function(e) {
        konamiCode.push(e.code);
        if (konamiCode.length > konamiSequence.length) {
            konamiCode.shift();
        }
        
        if (JSON.stringify(konamiCode) === JSON.stringify(konamiSequence)) {
            showNotification('🎉 ¡Código Konami activado! ¡Eres un verdadero desarrollador!', 'success');
            konamiCode = [];
        }
    });

    console.log('🚀 Portafolio cargado correctamente');
    console.log('💡 Tip: Intenta el código Konami para una sorpresa');
});