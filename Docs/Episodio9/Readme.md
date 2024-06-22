## Episodio 9

- Se modifica el archivo web.php para insertar una expresión regular que permita accedewr a combinaciones de letras y numeros y demás caracteres en el $slug

### En el archivo web.php se agrega una expresión regular que permite validar ciertos caractéres de la ruta de la página 

```php
Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)){
        // dd('file does not exist');
        return redirect('/');
@@ -30,7 +31,9 @@
    return view('post', [
        'post'=> $post
    ]);
}})->where('post', '[A-z_\-]+');//Esta es la expresión regular 
```