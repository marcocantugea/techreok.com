<?php
require_once 'config/config.php';

header('Content-Type: application/json');

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    JsonResponse::error('Método no permitido', 405);
}

// Verificar token CSRF
$input = json_decode(file_get_contents('php://input'), true);
if (!isset($input['csrf_token']) || !verify_csrf_token($input['csrf_token'])) {
    JsonResponse::error('Token CSRF inválido', 403);
}

// Obtener y validar datos
$nombre = sanitize_input($input['nombre'] ?? '');
$email = sanitize_input($input['email'] ?? '');
$asunto = sanitize_input($input['asunto'] ?? '');
$mensaje = sanitize_input($input['mensaje'] ?? '');

// Validaciones
$errores = [];

if (empty($nombre) || strlen($nombre) < 2) {
    $errores[] = 'El nombre debe tener al menos 2 caracteres';
}

if (empty($email) || !validate_email($email)) {
    $errores[] = 'Ingrese un email válido';
}

if (empty($asunto) || strlen($asunto) < 5) {
    $errores[] = 'El asunto debe tener al menos 5 caracteres';
}

if (empty($mensaje) || strlen($mensaje) < 10) {
    $errores[] = 'El mensaje debe tener al menos 10 caracteres';
}

if (!empty($errores)) {
    JsonResponse::error(implode(', ', $errores), 400);
}

// Aquí normalmente enviarías el email o guardarías en base de datos
// Por ahora solo simularemos el envío

try {
    // Simular procesamiento
    sleep(1);
    
    // Log del contacto
    log_message("Nuevo contacto de: {$nombre} ({$email}) - Asunto: {$asunto}");
    
    // En un entorno real, aquí usarías PHPMailer o similar
    $email_data = [
        'to' => get_personal_info()['email'],
        'from' => $email,
        'subject' => "Contacto desde portafolio: {$asunto}",
        'body' => "
            <h3>Nuevo mensaje desde tu portafolio</h3>
            <p><strong>Nombre:</strong> {$nombre}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Asunto:</strong> {$asunto}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{$mensaje}</p>
            <hr>
            <p><small>Enviado desde: {$_SERVER['HTTP_HOST']} el " . date('Y-m-d H:i:s') . "</small></p>
        "
    ];
    
    // Guardar en archivo temporal (para demo)
    $contact_file = 'data/contacts.json';
    $contacts = [];
    
    if (file_exists($contact_file)) {
        $contacts = json_decode(file_get_contents($contact_file), true) ?: [];
    }
    
    $contacts[] = [
        'id' => uniqid(),
        'nombre' => $nombre,
        'email' => $email,
        'asunto' => $asunto,
        'mensaje' => $mensaje,
        'fecha' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    // Crear directorio si no existe
    if (!file_exists('data')) {
        mkdir('data', 0755, true);
    }
    
    file_put_contents($contact_file, json_encode($contacts, JSON_PRETTY_PRINT));
    
    JsonResponse::success([
        'message' => 'Mensaje enviado correctamente. Te contactaré pronto.'
    ]);
    
} catch (Exception $e) {
    log_message("Error al procesar contacto: " . $e->getMessage(), 'ERROR');
    JsonResponse::error('Error interno del servidor. Por favor intenta más tarde.', 500);
}
?>