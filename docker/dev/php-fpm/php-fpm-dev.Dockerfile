FROM php:fpm-alpine3.14

RUN apk update

# RUN apk add php8-pdo php8-pdo_mysql php8-mysqli

RUN docker-php-ext-install pdo pdo_mysql

# RUN apk add --no-cache postgresql-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#     && docker-php-ext-install pdo_pgsql opcache

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /app
