FROM php:8.2-cli

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

WORKDIR /var/www/html/

EXPOSE 3000

CMD sh -c "php -S 0.0.0.0:${PORT:-3000} -t /var/www/html/"