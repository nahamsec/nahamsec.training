FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get -qq update -y && \
    apt-get -y -qq install \
    curl  \
    wget  \
    host  \
    nginx \
    mysql-server \
    php-fpm \
    php-pdo \
    php-mysql \
    php-curl \
    php-xml && \
    echo "Packages Installed"

COPY app /var/www/

RUN chown -R www-data:www-data /var/www/html

ADD default /etc/nginx/sites-available/default

COPY startup.sh /startup.sh
COPY db.sql /db.sql
RUN chmod +x /startup.sh

EXPOSE 80

CMD ["/startup.sh"]


