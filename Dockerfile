FROM php:8.2-fpm

WORKDIR /var/www

# Cài các gói cần thiết
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev

# Cài các extension PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép toàn bộ source vào
COPY . /var/www
COPY --chown=www-data:www-data . /var/www

# Phân quyền
RUN chmod -R 755 /var/www

# Cài thư viện PHP
RUN composer install --no-dev --optimize-autoloader

# KHÔNG tạo file .env ở đây → Render sẽ tự inject từ biến môi trường
# KHÔNG chạy php artisan config:clear/cache:clear ở build time

# Tạo APP_KEY nếu chưa có (làm ở runtime nếu cần)
# (Nên thực hiện sau khi container start, không nên để build fail nếu chưa có .env)
# RUN php artisan key:generate

EXPOSE 8000

# Lệnh chạy chính khi container start
CMD php artisan serve --host=0.0.0.0 --port=8000
