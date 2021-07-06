FROM php:7.3-fpm-alpine

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html/

# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
COPY . .
RUN composer install

# Bundle app source
RUN cp -a . /var/www/html_backup

ENTRYPOINT [ "/var/www/html/entry-point.sh" ]