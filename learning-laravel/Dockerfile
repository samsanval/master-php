FROM php:7.4-fpm

ARG user
ARG uid
WORKDIR /var/www

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd tokenizer ctype json
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./nginx /etc/nginx/conf.d
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
COPY --chown=$user:$user . /var/www
USER $user
EXPOSE 8080