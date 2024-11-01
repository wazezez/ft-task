# Starting

Build an image:
```docker-build```

Start containers: ```docker-compose up -d```

Install composer packages ```docker exec ft-task-php-fpm composer install```

Run migrations  ```docker exec ft-task-php-fpm php artisan migrate```

Run seeder  ```docker exec ft-task-php-fpm php artisan db:seed```
