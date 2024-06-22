## Episodio 7

- Se eliminan los archivos creados en el Episodio 6, se modifica el contenido de la pagina princiapl y el nombre de la ruta en el web.php, además se crean posts mediante html y una ruta para ver el contenido de solo ese post y un botón de volver

### Css
``` css
body{
    background: white;
    color: #222222;
    max-width: 600px;
    margin: auto;
    font-family: sans-serif;
}

p{
    line-height: 1.6;
}
article + article{
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid #c5c5c5;
}
```

## Este es un ejemplo de uno de los posts que se realizaron, en total fueron tres pero cuentan con la misma estructura
## HTML
```html
<!DOCTYPE html>

    <title>My blog</title>
    <link rel="stylesheet" href="/app.css">
<body>
    <article>
        <h1> <a href="/post">My first post</a> </h1>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, nostrum. Omnis laboriosam modi quia reprehenderit minima, quibusdam nam repudiandae in alias consequuntur ut quam aliquam unde, iusto officia labore accusamus.
        </p>
    </article>
    <a href="/">Go Back</a>
</body>
```

## Cambios en el archivo web.php
```php
Route::get('/', function () {
    #return view('welcome'); esto se cambio por la siguiente línea
    return view('posts');
});

Route::get('post', function () {
    return view('post');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
```