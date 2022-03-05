FROM php:8

RUN apt update

RUN apt-get install -y libxml2-dev git

RUN pecl install redis

RUN docker-php-ext-enable redis

RUN docker-php-ext-install sockets bcmath pcntl zip

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

ADD . .

RUN composer install

RUN touch storage/logs/laravel.log

EXPOSE 8000 8000

ENTRYPOINT php artisan octane:start --host 0.0.0.0 --port 8000
