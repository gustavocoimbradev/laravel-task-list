FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl zip libzip-dev sqlite3 libsqlite3-dev nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

RUN npm run build

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN touch /app/database/database.sqlite && chmod -R 777 /app/database

# RUN php artisan migrate --force

CMD php -S 0.0.0.0:10000 -t public