# imagen de dockerhub que descargara
FROM php:8.0-fpm

# algunas configuraciones para que funcione el contenedor
RUN docker-php-ext-install pdo pdo_mysql

# instala composer en el contenedor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update
RUN apt-get install -y git zip unzip

# da permisos para editar los archivos en esta ruta del container
# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/html

# Change current user to www
USER www

EXPOSE 9000