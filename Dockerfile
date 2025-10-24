# Dockerfile para Portafolio PHP 8 + Apache
FROM php:8.2-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html/

# Asignar permisos adecuados
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Configuración recomendada de Apache
COPY .htaccess /var/www/html/.htaccess

# Exponer el puerto 80
EXPOSE 80

# Variables de entorno recomendadas
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Comando por defecto
CMD ["apache2-foreground"]
