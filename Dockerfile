FROM php:8.1-apache

RUN apt-get update \
  && apt-get install -y git unzip

RUN docker-php-ext-install pdo_mysql

COPY . /var/www/html/

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html/public/uploads

USER www-data

EXPOSE 80