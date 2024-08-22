# syntax=docker/dockerfile:1
FROM composer:lts as deps-composer-base
WORKDIR /app
COPY artisan /app/
COPY app /app/app/
COPY bootstrap /app/bootstrap/
COPY config /app/config/
COPY database /app/database/
COPY lang /app/lang/
COPY public /app/public/
COPY resources /app/resources/
COPY routes /app/routes/
COPY storage /app/storage/

FROM deps-composer-base as deps-composer-prod
RUN --mount=type=bind,source=composer.json,target=composer.json \
    --mount=type=bind,source=composer.lock,target=composer.lock \
    --mount=type=cache,target=/tmp/cache \
    composer install --no-interaction

FROM deps-composer-base as deps-composer-dev
RUN --mount=type=bind,source=composer.json,target=composer.json \
    --mount=type=bind,source=composer.lock,target=composer.lock \
    --mount=type=cache,target=/tmp/cache \
    composer install --no-interaction

FROM node:latest as deps-node-base
WORKDIR /app
COPY package.json /app/
COPY package-lock.json /app/
COPY vite.config.js /app/
COPY tailwind.config.js /app/
COPY postcss.config.js /app/

FROM deps-node-base as deps-node-prod
COPY --from=deps-composer-prod /app /app
RUN npm install --production
RUN npm run build

FROM deps-node-base as deps-node-dev
COPY --from=deps-composer-dev /app /app
RUN npm install
RUN npm run build

FROM php:8.3-apache as base
RUN docker-php-ext-install pdo_mysql
COPY .env /var/www/html/.env

# Look at the .env file if DB_PASSWORD is set, otherwise use the password in the secret
# The secret is mounted in /run/secrets/db-password
RUN --mount=type=secret,id=db-password \
    sed -i "s/DB_PASSWORD=/DB_PASSWORD=\"$(cat /run/secrets/db-password)\"/" /var/www/html/.env

# This is for tinker
RUN mkdir /var/www/.config && chown -R www-data:www-data /var/www/.config
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite


FROM base as prod
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY --from=deps-composer-prod /app /var/www/html
COPY --from=deps-node-prod /app /var/www/html
COPY composer.json /var/www/html/composer.json
RUN chown -R www-data:www-data /var/www/html
USER www-data
RUN php /var/www/html/artisan optimize
RUN php /var/www/html/artisan config:cache

FROM base as dev
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY --from=deps-composer-dev /app /var/www/html
COPY --from=deps-node-dev /app /var/www/html
COPY composer.json /var/www/html/composer.json
COPY tests /var/www/html/tests/
COPY phpunit.xml /var/www/html/phpunit.xml
RUN chown -R www-data:www-data /var/www/html

FROM prod as test
