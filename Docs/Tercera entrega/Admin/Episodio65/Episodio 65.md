# Episodio 65
## En este video, aprenderá cómo limpiar el HTML de un formulario extrayendo una serie de "piezas" reutilizables que se pueden usar para construir cada sección. Por supuesto, usaremos componentes Blade para permitir esto.

## Creamos una nueva carpeta en resources\views\components llamada form y  nuevo componente blade llamado input.blade.php  en la carpeta form:
```php
@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-400 p-2 w-full"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
           required
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
```
## Se crean los siguientes componentes:

#####  textarea.blade.php:
```php
@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea
        class="border border-gray-400 p-2 w-full"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
```

#####  label.blade.php
```php
@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>
```

#####  field.blade.php:
```php
    <div class="mt-6">
        {{ $slot }}
    </div>

```

#####  error.blade.php
```php
       @props(['name'])

       @error($name)
       <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
       @enderror
```

#####  button.blade.php:
```php
     <x-form.button>Enviar</x-form.button>
```


- [Menú de episodios](../Admin.md)
- [Episodio 66](../Episodio66/Episodio%2066.md)