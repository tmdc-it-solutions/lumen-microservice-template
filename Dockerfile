FROM php:8.0-fpm-alpine

RUN apk add rsync
RUN docker-php-ext-install pdo_mysql

# Set up cache directory
RUN mkdir /var/www/cache
WORKDIR /var/www/cache

# Install composer
RUN mkdir tests
COPY composer.* ./
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN composer install

# Move to actual working directory
WORKDIR /var/www/html