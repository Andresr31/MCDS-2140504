# MCDS-2140504
### Repositorio de Especialización Metodologías de calidad para el desarrollo de software

***Comandos importantes***
    
  **Configuración base de datos**
  - cd /Applications/XAMPP/bin/
  - ./mysql -u root -p
  - CREATE DATABASE mcds-2140504;
  - Open directory cp .env.example .env
  - Open .env file in laravel directory "larapp"
  - Set DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD
  
  **Migraciones**
  - php artisan make:migration create_name_table
  - php artisan migrate
  - php artisan migrate:rollback
  - php artisan migrate:rollback --step=3
  - php artisan migrate:reset
  - php artisan migrate:refresh
  - php artisan migrate:refresh --seed
  - php artisan migrate:fresh
  - php artisan migrate:fresh --seed
  
  **Modelos**
  - php artisan make:model Name
  - php artisan make:model Name -m
  
  **Seeds**
  - php artisan make:seeder ModelSeeder
  - composer dump-autoload
  - php artisan db:seed
  - php artisan migrate:fresh --seed
  
  **Factory**
  - php artisan make:factory NameFactory
  - // https://github.com/fzaninotto/Faker
  
  **Rutas**
  - php artisan route:list
  - php artisan route:list -c
  - php artisan route:clear
  - php artisan route:cache
  
  **Laravel Mixin**
  - composer require laravel/ui || composer require laravel/ui "^2.0"
  - php artisan ui bootstrap
  - php artisan ui bootstrap --auth
  - npm run dev
  - npm run production
  - npm run watch

  
  
  

