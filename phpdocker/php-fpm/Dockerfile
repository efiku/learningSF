FROM phpdockerio/php71-fpm:latest

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php-memcached php7.1-mysql php7.1-sqlite3 php7.1-bcmath php7.1-bz2 php7.1-intl php-yaml \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/var/www/learningsf"

RUN apt-get update && apt-get -qq -y install curl &&  curl -o composer.phar https://getcomposer.org/composer.phar && chmod 777 composer.phar

RUN mkdir -p /usr/local/bin

RUN mv composer.phar /usr/local/bin/composer
