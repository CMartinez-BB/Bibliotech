npm i 
npm run build
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache


php artisan migrate --seed --force