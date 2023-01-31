FROM devilbox/php-fpm-8.2:latest

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
        libfreetype6-dev \
    	libjpeg62-turbo-dev \
    	libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-configure zip --with-libzip \
	&& docker-php-ext-install zip \
	&& docker-php-ext-install mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
