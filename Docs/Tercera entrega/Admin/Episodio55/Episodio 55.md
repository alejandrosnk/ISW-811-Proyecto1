# Episodio 55

## Ahora que cada publicación puede mostrar una lista de comentarios, creemos un formulario para permitir que cualquier usuario autenticado participe en la conversación.

## Para eso iremos al archivo show.blade.php y vamos a insertar este componente de tiplo blade:

```php
<x-panel>
    <form method="POST" action="#">
        @csrf
        <header class='flex items-center'>
            <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
            <h2 class='ml-4'>Want to participate?</h2>
        </header>
        <div class='mt-10'>
            <textarea name="body" class='w-full text-sm focus:outline-none focus:ring' rows='5' placeholder="Do you want to say anything?"></textarea>
        </div>
        <div class='flex justify-end mt-6 border-t border-gray-200 pt-6'>
            <button type='submit' class='bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600'>
                Post
            </button>
        </div>
    </form>
</x-panel>

```

## Este es un formulario para poder agregar comentarios de forma dinámica.

## Y luego en el post-comment.blade.php se encierra el contenido en el componente x-panel:
```php
@props(['comment'])

<x-panel class='bg-gray-50'>
    <article class="flex bg-gray-100 p-6 space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?id={{$comment->id}}" alt="" width="60" height="60" class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs">Posted
                    <time>{{$comment->created_at}}</time>
                </p>
            </header>
            <p>{{$comment->body}}</p>
        </div>
    </article>
</x-panel>

```

## Y para terminar se crea el componente panel.blade.php en el que se insertó lo siguiente:

```php
<div {{$attributes(['class'=> 'border border-gray-200 p-6 rounded-xl'])}}>
{{$slot}}
</div>
```

- [Menú de episodios](../Admin.md)
- [Episodio 56](../Episodio56/Episodio%2056.md) 

