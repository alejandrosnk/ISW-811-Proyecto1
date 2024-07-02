## Episodio 11
- Se crea un buscador de archivos y se muestran como un conjunto para mostrrarse sin acceder a cada uno individualmente y se crea la clase Post: funciones de busqueda: 

```php
public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
```

## Y las invocaciones de dichos métodos  en web.php:

``` php
Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    return view ('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');
```



