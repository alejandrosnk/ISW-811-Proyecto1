# Episodio 62
## Finalmente trabajemos en la sección de administración para publicar nuevas publicaciones. Antes de comenzar a construir el formulario, primero descubramos cómo agregar la capa de autorización necesaria para garantizar que solo los administradores puedan acceder a esta sección del sitio.

## Para esto, en el Postcontroller.php, agregamos la función create y store:
```php
public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }
```
## Posteriormente en el RegisterController.php, vamos a cambiar esta linea de código:
```php 
User::create($attributes);
``` 
### por esta
```php
auth()->login(User::create($attributes));
```
## Agregamos las nuevas rutas para los administradores y la creación del post:
```php
Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
```
## En el kernel.php agregamos un use: use App\Http\Middleware\MustBeAdministrator; y la difinición de ella:
```php
'admin' => MustBeAdministrator::class,
```
- [Menú de episodios](../Admin.md)
- [Episodio 63](../Episodio63/Episodio%2063.md)