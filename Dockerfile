FROM php:7.4-apache
RUN apt-get update \
    && apt-get upgrade \
    && a2enmod rewrite \
    && apt-get install -y --no-install-recommends git zlib1g-dev libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql zip \
    && curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
EXPOSE 80
WORKDIR /var/www/html