FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip git libicu-dev libzip-dev libpng-dev \
    libjpeg62-turbo-dev libfreetype-dev libonig-dev pkg-config \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl mbstring pdo_mysql mysqli zip gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Set Apache DocumentRoot ke /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/sites-available/default-ssl.conf

# Install dependencies dulu
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction || true

# Copy seluruh source code
COPY . .

# Set permissions writable
RUN mkdir -p writable \
    && chown -R www-data:www-data /var/www/html/writable

EXPOSE 80
