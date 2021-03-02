FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get -qq update -y && \
    apt-get -y -qq install \
    curl  \
    wget  \
    host  \
    nginx \
    gdebi \
    mysql-server \
    php-fpm \
    php-pdo \
    php-mysql \
    php-curl \
    php-xml && \
    echo "Packages Installed"



# install google chrome
RUN wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add -
RUN sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'
RUN apt-get --allow-unauthenticated -y update
RUN apt-get --allow-unauthenticated install -y google-chrome-stable

COPY app /var/www/

RUN chown -R www-data:www-data /var/www

ADD default /etc/nginx/sites-available/default

COPY startup.sh /startup.sh
COPY db.sql /db.sql

RUN chmod +x /startup.sh

EXPOSE 80

CMD ["/startup.sh"]
