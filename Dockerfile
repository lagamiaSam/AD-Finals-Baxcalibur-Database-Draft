# This automates the process of setting up the environment by specifying:

# - The base image (e.g., PHP, Node, etc.).
# - Dependencies to install.
# - Files to copy into the image.
# - Commands to run (e.g., start the server).

# This is the blueprint for creating a portable, consistent containerized environment.

FROM php:8.3.21-fpm-alpine3.20

ENV NODE_ENV=development

# TODO: Ask Sir if we will modify these.
RUN addgroup -S developer && adduser -S yourUsernameHere -G developer

WORKDIR /var/www/html

RUN apk add --no-cache git unzip autoconf make g++ icu-dev libzip-dev zlib-dev postgresql-dev libpq
RUN docker-php-ext-install pgsql pdo_pgsql intl zip
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

COPY --from=composer:2.6 /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/html/

USER yourUsernameHere

EXPOSE 8000

RUN composer install

CMD ["php", "-S", "0.0.0.0:8000", "router.php"]