FROM php:apache
LABEL maintainer="Luke Tainton <luke@tainton.uk>"
LABEL org.opencontainers.image.source="https://github.com/luketainton/urls"
COPY index.php /var/www/html
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite remoteip
EXPOSE 80
