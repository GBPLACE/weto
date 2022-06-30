WETO
===

### Setup for development

```shell
git clone git@github.com:GBPLACE/weto.git && cd weto
./dc up -d
./dc enter
composer install
cp .env.example .env.local
php artisan migrate:fresh
php artisan db:seed
php artisan key:generate
```
