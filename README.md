
## MetOcean Data Visualisation

### Installation

#### Environment Variables

`cp .env.example .env`

`touch database/database.sqlite`

update below variables to below value or accordingly
````
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=true
DB_DATABASE=/Users/sulaiman/Workspace/metocean/database/database.sqlite # your database path
````

#### Dependencies

`composer install`

`npm install`

#### Databases
Execute following below order
````
php artisan migrate --path=/database/migrations/2020_04_28_023112_create_metocean_description_table.php
php artisan db:seed --class=MetoceanDescriptionSeeder
php artisan migrate --path=/database/migrations/2020_04_28_023146_create_metocean_data_table.php
php artisan db:seed --class=MetoceanDataSeeder
````

### Deployment

`npm run prod`

`php artisan serve`
