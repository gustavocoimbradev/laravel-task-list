FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl zip libzip-dev libpq-dev nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

RUN npm run build

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

CMD php -S 0.0.0.0:10000 -t public
