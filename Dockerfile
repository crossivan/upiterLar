FROM php:8.2.1-apache-bullseye

USER root

#FROM node:19.4-slim

#COPY package.json .
#
#RUN npm install

#COPY . /var/www/html/

WORKDIR /var/www/html

RUN rm -f /etc/apache2/sites-enabled/000-default.conf

ADD ./000-default.conf /etc/apache2/sites-enabled

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions imagick

#RUN rm -f /etc/apache2/sites-available/000-default.conf
#
#ADD ./000-default.conf /etc/apache2/sites-available

RUN apt-get update && apt-get upgrade -y && apt-get install -y nano

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
    && a2enmod headers \
    && sed -ri -e 's/^([ \t]*)(<\/VirtualHost>)/\1\tHeader set Access-Control-Allow-Origin "*"\n\1\2/g' /etc/apache2/sites-available/*.conf

ENV TERM xterm

RUN service apache2 restart

EXPOSE 80


#CMD ("php","./public/index.php")
