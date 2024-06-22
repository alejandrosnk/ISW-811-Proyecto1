# Episodio 21
## Se accede a cada uno de los posts y se encierra el body en una tag tipo p: 
```php
$post->body='<p>' . $post->body . '</p>';
```

## Al igual se trata de agregar un strong al titulo: 
```php
$post->title='My <strong>first</strong> post';
```

## Y para que funcione, se realiza este cambio en el h1 del titulo: 
```php
<h1>{!!$post->title!!}</h1>
```