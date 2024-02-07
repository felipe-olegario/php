# Use a imagem oficial do PHP
FROM php:8.0-apache

# Instale extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copie os arquivos PHP do aplicativo para o diretório do Apache
COPY ./src/ /var/www/html/

# Exponha a porta 80 para o Apache
EXPOSE 80
