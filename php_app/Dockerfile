FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable mod_rewrite
RUN a2enmod rewrite

# Set env variables for DB connection
ENV DB_HOST=your_database_ip
ENV DB_USER=web_user
ENV DB_PASS=webpass
ENV DB_NAME=my_app_db

# Copy the PHP app
COPY app.php /var/www/html/index.php
