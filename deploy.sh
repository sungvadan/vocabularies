composer install --optimize-autoloader --no-dev &&
./artisan migrate &&
./artisan cache:clear &&
./artisan config:cache &&
./artisan view:cache &&
./artisan route:cache &&
./artisan event:cache
