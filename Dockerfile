FROM php:8.2-cli

RUN docker-php-ext-install mysqli

ENV MYSQLHOST=mysql.railway.internal
ENV MYSQLUSER=root
ENV MYSQLPASSWORD=HzBBwukSlXPfElGCgnATtoLLXktehhRu
ENV MYSQLDATABASE=railway
ENV MYSQLPORT=3306

COPY . /var/www/html/

WORKDIR /var/www/html/

EXPOSE 3000

CMD sh -c "php -S 0.0.0.0:${PORT:-3000} -t /var/www/html/"