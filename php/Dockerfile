FROM php:8.2-fpm

ENV ACCEPT_EULA=Y

RUN apt-get update && apt-get install -y \
    mc \
    cron \
    zip \
    unzip \
    libxml2-dev

RUN apt-get update && apt-get install -y \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    ca-certificates wget \
    dos2unix \
    git \
    gnupg \
    libzip-dev

RUN apt-get update && apt-get install -y \
    libldap2-dev\
    pkg-config \
    libc-dev \
    autoconf  \
    make   \
    g++   \
    gcc   \
    libaio1 \
    libaio-dev
RUN  rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure \
    ldap --with-libdir=lib/x86_64-linux-gnu/
RUN docker-php-ext-install \
    pdo_mysql \
    mysqli \
    xml \
    zip \
    opcache \
    ldap \
    pcntl \
    soap
RUN pecl install xdebug \
&& docker-php-ext-enable xdebug


RUN docker-php-ext-configure gd \
  --with-jpeg=/usr/include/ \
  --with-freetype=/usr/include/

RUN docker-php-ext-install gd \
    sockets

RUN echo xdebug.mode=debug >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.remote_port=9000 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.start_with_request=yes >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.client_port=9000 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.idekey=PHP_STORM >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.remote_host=host.docker.internal >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.client_host=host.docker.internal >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini