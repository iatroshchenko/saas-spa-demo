sudo su
cd /var/www/dev
git pull
composer install
php artisan migrate
exit
exit
