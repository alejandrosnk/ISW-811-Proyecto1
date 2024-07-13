# Episodio 58

## Comencemos familiarizándonos con la API de Mailchimp. Aprenderemos cómo instalar el SDK de PHP oficial y luego revisaremos los conceptos básicos de cómo realizar algunas llamadas API iniciales.

## Para ello, vamos primero al archivo components/layout.blade.php y vamos a agregar la ruta de y daremos la propiedad id al footer con newsletter:
```php
<footer id='newsletter' class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
```
## Luego en el enlace de subscripción también pero en la ruta:
```php
<a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
```
## Posteriormente vamos a hacer log in en mailchimp para envio de correos y conseguimos las API key para poder utilizar el servicio y vamos al archivo .env y creamos una nueva variable llamada:  MAILCHIMP_KEY donde pegamos la API key generada

## Después utilizamos esa variable en la siguiente isntrucción en services.php de config:

## Luego instalamos mailchimp en nuestro proyecto con: 
```bash
composer require mailchimp/marketing
```

## Luego creamos una ruta para poder añadir a un nuevo contacto al cual enviar un correo:
```php
Route::get('ping', function(){
$mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
	'apiKey' => config('services.mailchimp.key'),
	'server' => 'us18'
]);

$response = $mailchimp->lists->addListMember('9ff5300f37',[
    'email_address'=> 'lsolanor@est.utn.ac.cr',
    'status'=> 'subscribed'
]);
ddd($response);
});
```

- [Menú de episodios](../Admin.md)
- [Episodio 59](../Episodio59/Episodio%2059.md) 
