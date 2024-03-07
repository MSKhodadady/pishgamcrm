FROM php:7.4-fpm

#: install imap extension
RUN apt-get update && \
    apt-get install -y \
        libc-client-dev libkrb5-dev && \
    rm -r /var/lib/apt/lists/*
    
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl && \
    docker-php-ext-install -j$(nproc) imap

RUN docker-php-ext-install mysqli

RUN pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug

USER 1001:1001






