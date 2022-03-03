FROM bitnami/laravel:9

WORKDIR /app

ADD . .

RUN composer install

ENTRYPOINT php artisan octane:start
