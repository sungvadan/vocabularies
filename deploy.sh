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
ln -s /home/u316776651/domains/pomodoro25.com/vocabularies/public/css /home/u316776651/public_html/css
ln -s /home/u316776651/domains/pomodoro25.com/vocabularies/public/js /home/u316776651/public_html/js
