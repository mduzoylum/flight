FROM php:8.0-apache
WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y libmariadb-dev nano
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql
