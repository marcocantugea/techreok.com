<?php
require_once 'config/config.php';

header('Content-Type: application/json');

// Verificar que sea una petición GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    JsonResponse::error('Método no permitido', 405);
}

// Simular datos dinámicos de proyectos
$proyectos = [
    [
        'id' => 1,
        'titulo' => 'Sistema de Gestión de Inventario',
        'descripcion' => 'Aplicación web completa para gestionar inventarios con PHP y MySQL. Incluye funcionalidades de CRUD, reportes y autenticación de usuarios.',
        'tecnologias' => ['PHP 8', 'MySQL', 'Bootstrap 5', 'JavaScript ES6'],
        'imagen' => 'fas fa-boxes',
        'github' => 'https://github.com/usuario/inventario',
        'demo' => 'https://demo-inventario.com',
        'fecha_creacion' => '2024-01-15',
        'estado' => 'completado',
        'featured' => true
    ],
    [
        'id' => 2,
        'titulo' => 'API REST con PHP',
        'descripcion' => 'API RESTful desarrollada en PHP puro para manejar operaciones CRUD. Incluye autenticación JWT y documentación completa con Swagger.',
        'tecnologias' => ['PHP 8', 'JWT', 'MySQL', 'Swagger'],
        'imagen' => 'fas fa-server',
        'github' => 'https://github.com/usuario/api-rest',
        'demo' => null,
        'fecha_creacion' => '2024-02-20',
        'estado' => 'en_desarrollo',
        'featured' => true
    ],
    [
        'id' => 3,
        'titulo' => 'Dashboard Administrativo',
        'descripcion' => 'Panel de administración responsive con gráficos interactivos, tablas dinámicas y sistema de roles de usuario avanzado.',
        'tecnologias' => ['PHP 8', 'Chart.js', 'Bootstrap 5', 'MySQL', 'DataTables'],
        'imagen' => 'fas fa-chart-line',
        'github' => 'https://github.com/usuario/dashboard',
        'demo' => 'https://demo-dashboard.com',
        'fecha_creacion' => '2024-03-10',
        'estado' => 'completado',
        'featured' => false
    ],
    [
        'id' => 4,
        'titulo' => 'Sistema de Blog Avanzado',
        'descripcion' => 'Plataforma de blog con sistema de comentarios, categorías, etiquetas, SEO optimizado y panel de administración completo.',
        'tecnologias' => ['PHP 8', 'MySQL', 'TinyMCE', 'Bootstrap 5', 'SEO'],
        'imagen' => 'fas fa-blog',
        'github' => 'https://github.com/usuario/blog',
        'demo' => 'https://demo-blog.com',
        'fecha_creacion' => '2024-04-05',
        'estado' => 'completado',
        'featured' => true
    ],
    [
        'id' => 5,
        'titulo' => 'E-commerce Moderno',
        'descripcion' => 'Tienda online completa con carrito de compras, múltiples pasarelas de pago, sistema de inventario y análisis de ventas.',
        'tecnologias' => ['PHP 8', 'MySQL', 'PayPal API', 'Stripe', 'JavaScript'],
        'imagen' => 'fas fa-shopping-cart',
        'github' => 'https://github.com/usuario/ecommerce',
        'demo' => 'https://demo-shop.com',
        'fecha_creacion' => '2024-05-12',
        'estado' => 'completado',
        'featured' => true
    ],
    [
        'id' => 6,
        'titulo' => 'Sistema de Reservas Inteligente',
        'descripcion' => 'Aplicación para gestionar reservas con calendario interactivo, notificaciones automáticas, confirmaciones por email y SMS.',
        'tecnologias' => ['PHP 8', 'FullCalendar.js', 'MySQL', 'PHPMailer', 'Twilio'],
        'imagen' => 'fas fa-calendar-alt',
        'github' => 'https://github.com/usuario/reservas',
        'demo' => null,
        'fecha_creacion' => '2024-06-20',
        'estado' => 'en_desarrollo',
        'featured' => false
    ],
    [
        'id' => 7,
        'titulo' => 'CRM Empresarial',
        'descripcion' => 'Sistema de gestión de relaciones con clientes, seguimiento de leads, automatización de marketing y reportes avanzados.',
        'tecnologias' => ['PHP 8', 'MySQL', 'Chart.js', 'Bootstrap 5', 'TCPDF'],
        'imagen' => 'fas fa-users',
        'github' => 'https://github.com/usuario/crm',
        'demo' => 'https://demo-crm.com',
        'fecha_creacion' => '2024-07-15',
        'estado' => 'completado',
        'featured' => false
    ],
    [
        'id' => 8,
        'titulo' => 'Sistema de Tickets',
        'descripcion' => 'Plataforma de soporte técnico con sistema de tickets, chat en tiempo real, base de conocimientos y métricas de rendimiento.',
        'tecnologias' => ['PHP 8', 'WebSockets', 'MySQL', 'Bootstrap 5', 'Socket.io'],
        'imagen' => 'fas fa-ticket-alt',
        'github' => 'https://github.com/usuario/tickets',
        'demo' => null,
        'fecha_creacion' => '2024-08-30',
        'estado' => 'planificado',
        'featured' => false
    ]
];

// Parámetros de filtrado
$page = intval($_GET['page'] ?? 1);
$limit = intval($_GET['limit'] ?? 3);
$featured_only = filter_var($_GET['featured'] ?? false, FILTER_VALIDATE_BOOLEAN);
$estado = $_GET['estado'] ?? null;

// Filtrar proyectos
$proyectos_filtrados = $proyectos;

if ($featured_only) {
    $proyectos_filtrados = array_filter($proyectos_filtrados, fn($p) => $p['featured']);
}

if ($estado) {
    $proyectos_filtrados = array_filter($proyectos_filtrados, fn($p) => $p['estado'] === $estado);
}

// Paginación
$total = count($proyectos_filtrados);
$offset = ($page - 1) * $limit;
$proyectos_pagina = array_slice($proyectos_filtrados, $offset, $limit);

// Reindexar array
$proyectos_pagina = array_values($proyectos_pagina);

// Respuesta
JsonResponse::success([
    'proyectos' => $proyectos_pagina,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit),
        'has_more' => ($offset + $limit) < $total
    ]
]);
?>