FROM php:8.0-apache

RUN apt update -y
RUN apt upgrade -y

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY ./website/* /var/www/html/

#FROM php:7.4-fpm-alpine 

#RUN apk update 
#RUN apk add 

#RUN docker-php-ext-install mysqli pdo pdo_mysql

#COPY ./website/* /var/www/html/
