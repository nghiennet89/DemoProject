FROM php:8.1-fpm-alpine
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
COPY composer.* ./
RUN composer install --no-autoloader

