#!/bin/bash
echo '-------------------------------'
echo -e 'Setting up Laravel Dependencies'
echo '-------------------------------'
composer install

echo '-------------------------------'
echo -e 'Setting up .env with sqlite db and seeding'
echo '-------------------------------'
cp .env.example .env
sed -i -e 's/mysql/sqlite/g' .env
sed -i -e 's/DB_DATABASE=homestead/ /g' .env
sed -i -e 's/DB_USERNAME=homestead/ /g' .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed

sleep 1


echo '-------------------------------'
echo -e 'Installing npm modules'
echo '-------------------------------'

npm install

echo '-------------------------------'
echo -e 'Building resources'
echo '-------------------------------'

npm run dev

echo '-------------------------------'
echo -e 'Running server'
echo '-------------------------------'

php artisan serve --port 8000

echo '-------------------------------'
echo -e 'Server running on http://localhost:8000'
echo '-------------------------------'
