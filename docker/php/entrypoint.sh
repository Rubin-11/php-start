#!/bin/sh
set -e

if [ -f "/app/composer.json" ] && [ ! -d "/app/vendor" ]; then
    echo ">>> Installing Composer dependencies..."
    composer install --no-interaction --optimize-autoloader --working-dir=/app
fi

exec docker-php-entrypoint "$@"
