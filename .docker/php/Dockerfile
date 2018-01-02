FROM php:7.1-fpm

COPY app /opt/projects/app

RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        git \
        zip \
        mysql-client \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) \
        gd \
        zip \
        sockets \
        pdo \
        pdo_mysql \
        opcache

RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.0.3 \
    && docker-php-ext-enable memcached

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Permission fix
RUN chmod -R 755 /opt

EXPOSE 9000

CMD ["php-fpm"]
