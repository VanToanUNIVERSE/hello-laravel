FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www
COPY --chown=www-data:www-data . /var/www

RUN chmod -R 755 /var/www
RUN composer install

#XÓA dòng này nếu bạn dùng Render
#COPY .env.example .env

#XÓA CACHE để Laravel đọc lại biến môi trường từ Render
RUN php artisan config:clear && php artisan cache:clear

RUN php artisan key:generate

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
