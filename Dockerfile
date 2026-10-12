FROM php:8.5-apache
WORKDIR /var/www/html
#composer
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip
#In below code first path is address where composer located in current image (downloaded frmo DockerHub),
#the second path is the destination directory inside container.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# download my sql PDO extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# # change directory to public in APACHE config
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# enable Apache mod_rewrite for work with routing
RUN a2enmod rewrite