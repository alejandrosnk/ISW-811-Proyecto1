## Episodio 18

se ejecuta ```php artisan``` para limpiar la base de datos

se ejecuta ```php artisan migrate:rollback``` para deshacer los cambios de las migraciones

se ejecuta ```php artisan migrate``` para hacer las migraciones

se ejecuta ```php artisan migrate:fresh``` para eliminar todas las tablas y ejecutar todas las migraciones otra ves

en el .env: se cambio esto:```APP_ENV=local``` por esto: ```APP_ENV=production``` y se vio que el sistema no permite ejecutar el comando anterior porque se está en un ambiente de producción