#!/bin/bash

service nginx start
service php7.4-fpm start
service mysql start
sleep 5
mysql < /db.sql
rm /db.sql


while true; do sleep 1; done;

