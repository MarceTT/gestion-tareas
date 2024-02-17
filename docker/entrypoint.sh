if [ ! -f /var/www/html/composer.json ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f .env ]; then
    cp .env.example .env
fi

php-fpm -D
nginx -g "daemon off;"