FROM php:latest

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    mysql-client \
    && docker-php-ext-install pdo_mysql

RUN apt-get install -y git
RUN git clone https://github.com/Abhishek-Jain-1925/ServicePro.git

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80"]