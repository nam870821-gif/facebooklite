FROM php:8.2-cli

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

WORKDIR /var/www/html/

RUN echo "<?php \$c=mysqli_connect('mysql.railway.internal','root','HzBBwukSlXPfElGCgnATtoLLXktehhRu','railway',3306); if(\$c->connect_error){die(\$c->connect_error);} echo 'DB OK'; ?>" > /var/www/html/test_db.php

EXPOSE 3000

CMD sh -c "php -S 0.0.0.0:${PORT:-3000} -t /var/www/html/"