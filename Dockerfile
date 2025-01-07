FROM node:18.20.5 AS build

COPY ./project/wp-content/themes/nufarm /nufarm

# Change workdir
WORKDIR /nufarm

RUN npm install
RUN npm run styles
RUN npm run scripts
# Remove node_modules folder as we no longer need it
RUN rm -rf node_modules

FROM php:7.4-apache

RUN set -eux; \
   \
   if command -v a2enmod; then \
   a2enmod rewrite ssl headers expires; \
   fi;

# Install required tools and php extensions
RUN apt-get update && apt-get install -y \
   git \
   zip \
   curl \
   unzip \
   libzip-dev \
   libicu-dev \
   libbz2-dev \
   libpng-dev \
   libjpeg-dev \
   libmcrypt-dev \
   libreadline-dev \
   libfreetype6-dev \
   g++ \
   vim \
   nano \
   libwebp-dev \
   ssl-cert

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp=/usr/include/; \
   docker-php-ext-install gd opcache mysqli pdo pdo_mysql bcmath; \
   make-ssl-cert generate-default-snakeoil; \
   a2ensite default-ssl.conf

COPY ./project /var/www/html

COPY --from=build /nufarm/dist /var/www/html/wp-content/themes/nufarm/dist

EXPOSE 80 443