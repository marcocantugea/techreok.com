# Dockerfile para Portafolio PHP 8 + Apache
FROM php:8.2-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite

# Copiar todos los archivos del proyecto al contenedor
COPY . /var/www/html/

# Asignar permisos adecuados (desde /var/www)
RUN chown -R www-data:www-data /var/www && \
    find /var/www -type d -exec chmod 755 {} \; && \
    find /var/www -type f -exec chmod 644 {} \; && \
    chown www-data:www-data /var/www/html/.htaccess && \
    chmod 644 /var/www/html/.htaccess

# Eliminar atributos de fin de línea de Windows (CRLF) en todos los archivos
RUN apt-get update && apt-get install -y dos2unix && \
    find /var/www/html -type f -exec dos2unix {} \;

# Eliminar advertencia de ServerName
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80

# Variables de entorno recomendadas
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Comando por defecto
CMD ["apache2-foreground"]
