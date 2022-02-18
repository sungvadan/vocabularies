git fetch &&
git reset --hard origin/master &&
composer install --optimize-autoloader --no-dev &&
./artisan migrate --force &&
./artisan cache:clear &&
./artisan config:cache &&
./artisan view:cache &&
./artisan route:cache &&
./artisan event:cache
./artisan storage:link
