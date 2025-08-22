# ================================
# Stage 1: Composer (build vendor)
# ================================
FROM composer:2 AS vendor

WORKDIR /app

# Copy composer files & install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction

# Copy semua source code
COPY . .

# Jalankan composer lagi setelah copy penuh (untuk autoload dsb)
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction


# ================================
# Stage 2: PHP + Apache (final image)
# ================================
FROM php:8.2-apache

# Install ekstensi yang sering dipakai CI4
RUN apt-get update && apt-get install -y \
    libicu-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl mysqli pdo_mysql mbstring gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot ke public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && printf '<Directory "%s">\n    AllowOverride All\n    Require all granted\n</Directory>\n' "$APACHE_DOCUMENT_ROOT" \
    > /etc/apache2/conf-available/ci4-override.conf \
 && a2enconf ci4-override

WORKDIR /var/www/html

# Copy hasil build dari stage vendor
COPY --from=vendor /app /var/www/html

# Pastikan writable bisa ditulis
RUN chown -R www-data:www-data writable \
 && chmod -R ug+rwX writable

EXPOSE 80
