## Episodio 10

- Se modifica el archivo web.php con el fin de parsear el contenido de la página y almacenarlo en caché por 1200 segundos 
```php
 $post = cache()->remember("posts.{$slug}" , 1200, fn()=>file_get_contents($path));
 ```

 - Quedando así:

 ```php
 Route::get('posts/{post}', function ($slug) {
 if(! file_exists($path= __DIR__ . "/../resources/posts/{$slug}.html")){
        // dd('file does not exist');
        return redirect('/');
    }
 $post = cache()->remember("posts.{$slug}", 1200, fn()=>file_get_contents($path));
 return view('post', ['post'=> $post]);
})->where('post', '[A-z_\-]+');
 ```