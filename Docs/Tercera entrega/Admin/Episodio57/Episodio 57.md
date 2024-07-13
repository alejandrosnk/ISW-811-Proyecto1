# Episodio 57

## Antes de pasar a la siguiente sección, tomemos unos momentos para limpiar lo que ensuciamos. Extraeremos un par de componentes Blade, crearemos una inclusión PHP y luego reformatearemos manualmente partes de nuestro código.

## Se agrega la validación de que el campo de texto tenga al minimo un caractér en el componente show.blade.php: 
```php
@error('body')
	<span class='text-xs text-red-500'>{{$message}}</span>
@enderror
```
## Además de agregar la restricción de requerido en el campo de texto:
```php
 <textarea name="body" class='w-full text-sm focus:outline-none focus:ring' rows='5' placeholder="Do you want to says anything?" required></textarea>
```
## Creamos un nuevo componente llamado _add-comment-form.blade.php en el cual pegamos el contenido del @auth que se cortó de show.blade.php:
 ```php
 @auth
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf
            <header class='flex items-center'>
                <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                <h2 class='ml-4'>Want to participate?</h2>
            </header>
            <div class='mt-10'>
                <textarea name="body" class='w-full text-sm focus:outline-none focus:ring' rows='5' placeholder="Do you want to say anything?" required></textarea>
                @error('body')
                    <span class='text-xs text-red-500'>{{$message}}</span>
                @enderror
            </div>
            <div class='flex justify-end mt-6 border-t border-gray-200 pt-6'>
                <button type='submit' class='bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600'>
                    Post
                </button>
            </div>
        </form>
    </x-panel>
@else
    <p class='font-semibold'>
        <a href="/register" class='hover:underline'>Register</a> or
        <a href="/login" class='hover:underline'>Log in</a>
        to leave a comment
    </p>
@endauth

 ```

## Y en lugar del button, agregamos el componente del botón: 
```php
<x-submit-button>Post</x-submit-button>
```
- [Menú de episodios](../Admin.md)
- [Episodio 58](../Episodio58/Episodio%2058.md) 
