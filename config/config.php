<?php
// Configuración de la aplicación
define('APP_NAME', 'Mi Portafolio');
define('APP_VERSION', '1.0.0');
define('APP_AUTHOR', 'Desarrollador');

// Configuración de la base de datos (para futuras expansiones)
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configuración de zona horaria
date_default_timezone_set('America/Mexico_City');

// Configuración de errores para desarrollo
if ($_SERVER['HTTP_HOST'] === 'localhost' || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    define('DEBUG_MODE', true);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    define('DEBUG_MODE', false);
}

// Función para sanitizar datos de entrada
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para validar email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para generar token CSRF
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Función para verificar token CSRF
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Clase para manejar respuestas JSON
class JsonResponse {
    public static function success($data = null, $message = 'Success') {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
        exit;
    }
    
    public static function error($message = 'Error', $code = 400) {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode([
            'status' => 'error',
            'message' => $message,
            'code' => $code
        ]);
        exit;
    }
}

// Información personal (puede ser movida a base de datos posteriormente)
$personal_info = [
    'name' => 'Tu Nombre',
    'title' => 'Desarrollador Full Stack',
    'email' => 'tu.email@ejemplo.com',
    'phone' => '+52 123 456 7890',
    'location' => 'Ciudad, País',
    'description' => 'Desarrollador Full Stack especializado en crear aplicaciones web modernas y escalables. Apasionado por la tecnología y siempre en busca de nuevos desafíos.',
    'social_links' => [
        'github' => 'https://github.com/tuusuario',
        'linkedin' => 'https://linkedin.com/in/tuusuario',
        'twitter' => 'https://twitter.com/tuusuario',
        'email' => 'mailto:tu.email@ejemplo.com'
    ]
];

// Función para obtener información personal
function get_personal_info() {
    global $personal_info;
    return $personal_info;
}

// Función para logging simple
function log_message($message, $level = 'INFO') {
    if (DEBUG_MODE) {
        $timestamp = date('Y-m-d H:i:s');
        $log_entry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
        file_put_contents('logs/app.log', $log_entry, FILE_APPEND | LOCK_EX);
    }
}

// Crear directorio de logs si no existe
if (!file_exists('logs')) {
    mkdir('logs', 0755, true);
}
?>