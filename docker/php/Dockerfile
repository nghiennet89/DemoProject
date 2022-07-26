FROM php:8.1-fpm-alpine as base-system
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
FROM base-system
WORKDIR /var/www/html
COPY composer.json ./
USER 1000
RUN composer install
