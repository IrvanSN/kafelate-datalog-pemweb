# We are using PHP's official image from Docker Hub
FROM php:7.4-apache

# Install git, unzip
RUN apt-get update \
  && apt-get install -y git unzip

# Install MySQL PDO extension
RUN docker-php-ext-install pdo_mysql

# Copy the application files to the Docker image
COPY . /var/www/html/

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Try to enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
