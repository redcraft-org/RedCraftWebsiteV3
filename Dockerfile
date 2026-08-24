# syntax=docker/dockerfile:1

##############################################################################
# Shared base: php extensions, used by both the dependency and runtime stages.
##############################################################################
FROM dunglas/frankenphp:1.12-php8.5-trixie AS base

# pcntl is what lets octane:start and queue:work see SIGTERM, so a rolling
# restart drains instead of being killed. gd is new: the skin endpoints call
# imagecreatefromstring and the old image never had it, so they were failing.
# intl and zip are hard requirements of filament/support and openspout, which
# is why they are here and not only in the runtime stage. sockets is gone, only
# the roadrunner packages needed it.
RUN install-php-extensions \
        pcntl \
        pdo_mysql \
        bcmath \
        zip \
        redis \
        gd \
        intl \
        opcache

##############################################################################
# Dependencies, cached separately from the app source so a code change does
# not re-resolve the whole tree.
##############################################################################
FROM base AS vendor

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./

# --no-scripts because post-autoload-dump runs package:discover, which needs the
# app source that is not in this stage yet. Stage two runs it with the source.
RUN composer install \
        --no-dev \
        --no-scripts \
        --no-autoloader \
        --prefer-dist \
        --no-interaction \
        --no-progress

##############################################################################
# Runtime
##############################################################################
FROM base

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

WORKDIR /app

COPY --from=vendor /app/vendor ./vendor
COPY . .

RUN composer dump-autoload --optimize --classmap-authoritative --no-dev --no-interaction \
    # Installed at build time because Octane would otherwise write it into
    # public/ on every boot, which fails on a read-only root filesystem.
    && cp vendor/laravel/octane/src/Commands/stubs/frankenphp-worker.php public/frankenphp-worker.php \
    && mkdir -p storage/logs \
                storage/framework/cache \
                storage/framework/sessions \
                storage/framework/views \
                bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

ENV OCTANE_SERVER=frankenphp \
    APP_BASE_PATH=/app \
    APP_PUBLIC_PATH=/app/public \
    XDG_CONFIG_HOME=/config \
    XDG_DATA_HOME=/data \
    OCTANE_STATE_FILE=/tmp/octane-server-state.json

EXPOSE 8000

# Exec form on purpose. Shell form makes /bin/sh pid 1, and sh does not pass
# SIGTERM on, so every rolling restart drops whatever was in flight.
# No --https: Octane builds the Caddy address as http://:8000 and disables
# automatic HTTPS, which is what belongs behind the ingress. OCTANE_HTTPS only
# affects generated urls, so it stays true in the environment.
ENTRYPOINT ["php", "artisan", "octane:start", \
            "--server=frankenphp", \
            "--host=0.0.0.0", \
            "--port=8000", \
            "--admin-port=2019", \
            "--workers=4", \
            "--max-requests=500", \
            "--log-level=WARN"]
