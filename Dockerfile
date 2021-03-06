FROM php:7.4-apache
RUN apt-get update \
    && apt-get upgrade -y \
    && docker-php-ext-install mysqli
ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN a2enmod rewrite