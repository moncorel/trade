FROM php:7.4-apache

RUN a2enmod rewrite && \
    rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo pdo_mysql
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
COPY default.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/app

RUN chmod -R 775 /var/www/

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 8090
