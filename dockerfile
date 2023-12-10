FROM php:7.1-apache
RUN apt-get update && docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
COPY . /var/www
EXPOSE 80