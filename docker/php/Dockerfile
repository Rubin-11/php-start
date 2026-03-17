FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    g++ \
    git \
    libicu-dev \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync

RUN install-php-extensions opcache pdo_pgsql pcntl bcmath intl zip pgsql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY docker/php/php-fpm-pool.conf /usr/local/etc/php-fpm.d/zzz-custom.conf
COPY docker/php/entrypoint.sh /usr/local/bin/app-entrypoint.sh
RUN chmod +x /usr/local/bin/app-entrypoint.sh

WORKDIR /app

ENTRYPOINT ["/usr/local/bin/app-entrypoint.sh"]
CMD ["php-fpm"]
