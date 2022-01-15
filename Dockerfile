FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev
    
RUN docker-php-ext-install pdo_mysql intl opcache gd

WORKDIR /app
COPY . /app
VOLUME [ "/app" ]

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000