#########################################
# image for base build environment
########################################
FROM php:8.0-fpm-alpine as base

# Install dependencies
RUN apk add rsync supervisor gmp-dev
RUN docker-php-ext-install gmp sockets pdo_mysql bcmath pcntl

# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Create non-root user
RUN addgroup -S appgroup -g 1000 && adduser -S appuser -G appgroup -u 1000

#########################################
# image for dev build environment
########################################
FROM base as development

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

#########################################
# image for production build environment
########################################
FROM base as production

# Move to actual working directory
USER appuser
WORKDIR /var/www/html

# Install composer packages
COPY --chown=appuser:appgroup . .
RUN composer install

# Install supervisor
COPY supervisord.conf /etc/supervisord.conf

CMD [ "supervisord", "-c", "/etc/supervisord.conf" ]