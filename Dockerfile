# Use official PHP 8.3 with Apache
FROM php:8.3 

# Install required dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    curl \
    libxml2-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql gd zip dom curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php && \
    HASH=$(curl -sS https://composer.github.io/installer.sig) && \
    echo "$HASH  /tmp/composer-setup.php" | sha384sum -c - && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

WORKDIR /data
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
EXPOSE 8000
CMD ["php","artisan","serve"]