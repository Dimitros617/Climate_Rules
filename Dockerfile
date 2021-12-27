FROM php:7.4.3

ENV APP_PORT="8181"

RUN apt-get update -y && apt-get install -y openssl zip unzip git libonig-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql mbstring
WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan config:clear

CMD ./run.sh
EXPOSE $APP_PORT