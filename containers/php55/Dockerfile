FROM php:5.5-apache

RUN apt-get update \
 && apt-get install --no-install-recommends -y \
    nodejs \
    npm \
    php5-cli \
    php5-curl \
    php5-json \
    php5-intl \
    php5-apcu \
    curl \
 && apt-get clean \
 && rm -r /var/lib/apt/lists/*

RUN ln -sf /usr/bin/nodejs /usr/bin/node \
 && npm install -g bower less

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer


ADD vhost.conf /etc/apache2/sites-enabled/000-default.conf