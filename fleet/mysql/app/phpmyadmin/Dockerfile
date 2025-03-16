FROM phpmyadmin:latest

RUN apt update
RUN apt install libyaml-dev libzip-dev -y
RUN pecl install yaml
RUN echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini