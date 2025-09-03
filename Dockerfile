FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libxml2-dev libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

ENV APP_ENV=dev

RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

CMD ["php", "-S", "0.0.0.0:8001", "-t", "public"]
