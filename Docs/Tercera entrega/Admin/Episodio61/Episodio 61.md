# Episodio 61

## El próximo episodio es complementario. Es un poco más avanzado y revisa contenedores de servicios, proveedores y contratos. Aunque hago todo lo posible para desglosarlo todo, no dude en hacer cualquier pregunta que pueda tener en los comentarios a continuación. De lo contrario, si te sientes abandonado por este episodio, lo cierto es que puedes pasar mucho tiempo sin comprender del todo estos conceptos.

## Para lograr esto modificamos el AppService:
```php
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us18'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
} 
```

## Creamos un nuevo servicio en la carpeta Services llamado ConvertKitNewsletter.php:
```php
class ConvertKitNewsletter implements Newsletter
{
    public function subscribe(string $email, string $list=null)
    {
    }
}
```
## Además en MailchimpNewsletter.php modificamos los métodos y creamos nuevos:
```php
class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
        //
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
```
## Además en el archivo Newsletter.php agregamos esta interfaz:
```php
<?php

namespace App\Services;
interface Newsletter
{
    public function subscribe(string $email, string $list = null);
}
```
- [Menú de episodios](../Admin.md)
- [Episodio 62](../Episodio62/Episodio%2062.md)