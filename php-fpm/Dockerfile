FROM php:7.2-fpm-alpine
RUN apk add --no-cache \
  $PHPIZE_DEPS \
  && pecl install xdebug-2.6.0 \
  && docker-php-ext-install mysqli pdo pdo_mysql \
  && docker-php-ext-enable xdebug