# Episodio 23

## Se crea una nueva propiedad llamada slug en la migracion y se crean los nuevos posts luego de eliminarlos:
 ```bash 
 Post::create([
    'title' => 'Cuarto post',
    'slug' => 'cuarto-post',
    'excerpt' => 'Algunas cosas ahí',
    'body' => 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final. Aunque no posee actualmente fuentes para justificar sus hipótesis, el profesor de filología clásica.'
]);
```

## Y se agrega la parte de que cuando se acceda a un post se vea en la ruta superior, esto en Post:
```php
public function getRouteKeyName(){

        return 'slug';
}
```

## Y esto en el web.php:
```php 
Route::get('posts/{post:slug}', function (Post $post) {
    return view ('post', [
        'post' => $post
    ]);
});
```