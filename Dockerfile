FROM php:8.0-fpm-alpine

# Install dependencies
RUN apk add rsync
RUN apk add supervisor
RUN apk add gmp-dev

RUN docker-php-ext-install gmp
RUN docker-php-ext-install sockets
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pcntl

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Create user
RUN addgroup -S appgroup -g 1000 && adduser -S appuser -G appgroup -u 1000

# Set up cache directory
RUN mkdir /var/www/cache
RUN chown appuser /var/www/cache
USER appuser
WORKDIR /var/www/cache

# Install composer packages
RUN mkdir tests
COPY composer.* ./
RUN composer install

# Install supervisor
COPY supervisord.conf /etc/supervisord.conf

# Move to actual working directory
WORKDIR /var/www/html
