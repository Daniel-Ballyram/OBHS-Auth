FROM php:8.2-cli

WORKDIR /app
COPY public /app/public

CMD php -S 0.0.0.0:8080 -t /app/public
