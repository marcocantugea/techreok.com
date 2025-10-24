# 🚀 Portafolio Desarrollador - PHP 8

Un sitio web moderno y responsive para mostrar el portafolio de un desarrollador, construido con PHP 8, Bootstrap 5 y JavaScript vanilla.

## ✨ Características

- **Diseño Responsive**: Compatible con todos los dispositivos
- **Tecnologías Modernas**: PHP 8, Bootstrap 5, JavaScript ES6+
- **3 Secciones Principales**:
  - 🏠 Inicio (Hero section con información personal)
  - 💼 Mi Experiencia (Habilidades técnicas y experiencia profesional)  
  - 📁 Proyectos Públicos (Galería de proyectos con carga dinámica)

- **Funcionalidades Avanzadas**:
  - Navegación suave entre secciones
  - Animaciones CSS y JavaScript
  - Carga dinámica de proyectos via API
  - Sistema de contacto con validación
  - Logging de actividad
  - Protección CSRF
  - Responsive design

## 🛠️ Tecnologías Utilizadas

- **Backend**: PHP 8.0+
- **Frontend**: HTML5, CSS3, JavaScript ES6+
- **Framework CSS**: Bootstrap 5.3.0
- **Iconos**: Font Awesome 6.4.0
- **Animaciones**: CSS3 Animations & Transitions

## 📁 Estructura del Proyecto

```
techreok.com/
├── index.php                 # Página principal
├── config/
│   └── config.php            # Configuración de la aplicación
├── api/
│   ├── contact.php           # API para formulario de contacto
│   └── projects.php          # API para obtener proyectos
├── assets/
│   ├── css/
│   │   └── style.css         # Estilos personalizados
│   └── js/
│       └── main.js           # JavaScript principal
├── data/                     # Datos persistentes (JSON)
├── logs/                     # Logs de la aplicación
└── README.md                 # Documentación
```

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP 8.0 o superior
- Servidor web (Apache/Nginx) o entorno de desarrollo como Laragon/XAMPP
- Navegador web moderno

### Instalación

1. **Clonar o descargar el proyecto**
   ```bash
   git clone <repository-url>
   cd techreok.com
   ```

2. **Configurar permisos** (Linux/Mac)
   ```bash
   chmod 755 data/ logs/
   chmod 644 config/config.php
   ```

3. **Configurar información personal**
   - Editar `config/config.php`
   - Actualizar el array `$personal_info` con tu información

4. **Configurar servidor web**
   - Apuntar el document root a la carpeta del proyecto
   - Asegurar que PHP esté habilitado
   - Opcional: Configurar virtual hosts

### Configuración de Laragon (Windows)

1. Colocar el proyecto en `C:\laragon\www\techreok.com`
2. Acceder a `http://techreok.com.test` o `http://localhost/techreok.com`

## 🎨 Personalización

### Información Personal

Edita el archivo `config/config.php` para actualizar:

```php
$personal_info = [
    'name' => 'Tu Nombre Completo',
    'title' => 'Tu Título Profesional',
    'email' => 'tu.email@ejemplo.com',
    'phone' => '+52 123 456 7890',
    'location' => 'Tu Ciudad, País',
    'description' => 'Tu descripción profesional...',
    'social_links' => [
        'github' => 'https://github.com/tuusuario',
        'linkedin' => 'https://linkedin.com/in/tuusuario',
        // ...
    ]
];
```

### Colores y Estilos

Modifica las variables CSS en `assets/css/style.css`:

```css
:root {
    --primary-color: #007bff;
    --secondary-color: #6c757d;
    /* Personaliza los colores aquí */
}
```

### Proyectos

Los proyectos se cargan dinámicamente desde `api/projects.php`. Puedes:

1. **Modificar proyectos estáticos**: Editar el array `$proyectos` en `api/projects.php`
2. **Conectar a base de datos**: Reemplazar el array con consultas a BD
3. **Integrar con GitHub API**: Obtener proyectos automáticamente

## 🔧 APIs Disponibles

### GET /api/projects.php

Obtiene la lista de proyectos con paginación.

**Parámetros:**
- `page` (int): Página actual (default: 1)
- `limit` (int): Proyectos por página (default: 3)
- `featured` (bool): Solo proyectos destacados
- `estado` (string): Filtrar por estado (completado, en_desarrollo, planificado)

**Ejemplo:**
```
GET /api/projects.php?page=1&limit=6&featured=true
```

### POST /api/contact.php

Procesa formularios de contacto.

**Datos requeridos:**
```json
{
    "csrf_token": "token_csrf",
    "nombre": "Nombre del contacto",
    "email": "email@ejemplo.com",
    "asunto": "Asunto del mensaje",
    "mensaje": "Contenido del mensaje"
}
```

## 🎯 Características Técnicas

### Seguridad

- **Protección CSRF**: Tokens para formularios
- **Sanitización**: Limpieza de datos de entrada
- **Validación**: Validación server-side y client-side
- **Logging**: Registro de actividades importantes

### Performance

- **Lazy Loading**: Carga progresiva de proyectos
- **Optimización CSS**: Animaciones suaves y eficientes
- **JavaScript Modular**: Código organizado y reutilizable
- **Responsive Images**: Adaptación automática de imágenes

### SEO y Accesibilidad

- **Semántica HTML5**: Estructura correcta de contenido
- **Meta tags**: Configuración básica de SEO
- **Navegación por teclado**: Accesible para todos los usuarios
- **Contraste**: Colores que cumplen estándares de accesibilidad

## 🎨 Personalización Avanzada

### Agregar Nueva Sección

1. **HTML**: Agregar sección en `index.php`
2. **CSS**: Estilos en `assets/css/style.css`
3. **JavaScript**: Funcionalidad en `assets/js/main.js`
4. **Navegación**: Actualizar navbar y smooth scrolling

### Integración con Base de Datos

```php
// Ejemplo de conexión PDO en config.php
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
```

### Formulario de Contacto Funcional

Para habilitar el envío real de emails, instalar PHPMailer:

```bash
composer require phpmailer/phpmailer
```

## 🚨 Troubleshooting

### Problemas Comunes

1. **Permisos de escritura**
   ```bash
   chmod 755 data/ logs/
   ```

2. **PHP no habilitado**
   - Verificar configuración del servidor
   - Revisar archivo `.htaccess` si es necesario

3. **Errores de JavaScript**
   - Abrir Developer Tools (F12)
   - Revisar la consola para errores

4. **Problemas de estilo**
   - Verificar que Bootstrap se cargue correctamente
   - Comprobar rutas de archivos CSS

## 📱 Responsive Breakpoints

- **Mobile**: < 576px
- **Tablet**: 576px - 768px
- **Desktop**: 768px - 1200px
- **Large Desktop**: > 1200px

## 🎁 Easter Eggs

- **Código Konami**: ↑↑↓↓←→←→BA para una sorpresa
- **Console Messages**: Mensajes ocultos en la consola del navegador

## 📄 Licencia

Este proyecto es de código abierto. Puedes usarlo, modificarlo y distribuirlo libremente.

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature
3. Commit tus cambios
4. Push a la rama
5. Abre un Pull Request

## 📞 Soporte

Si tienes preguntas o necesitas ayuda:

- 📧 Email: tu.email@ejemplo.com
- 💬 GitHub Issues: Para reportar bugs o solicitar features

---

**¡Hecho con ❤️ y mucho ☕ por un desarrollador apasionado!**