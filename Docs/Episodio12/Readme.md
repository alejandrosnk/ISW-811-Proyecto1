## Episodio 12

- Se instala yaml con: en bash ```composer require spatie/yaml-front-matter```para el manejo de metadatos, luego se modifican los archivos para poder asignar parametricamente los valores a las etiquetas de la página como por ejemplo:

### Archivo Post.php

```php
<?php

namespace App\Models;


use Spatie\YamlFrontMatter\YamlFrontMatter;

Class Post{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
```


## Properties en html(se agregaron en todos los archivos de los posts)
```html
---
title: My first Post
slug: my-first-post
excerpt: Lorem ipsum dolor sit amet consectetur adipisicing elit.
date: 2021-05-21
---
```
## Se modifica la nomenclatura del archivo post.blade.php

### De esto:
```php
<title>My blog</title>
    <link rel="stylesheet" href="/app.css">
```

### A esto
```php
<?=$post; ?>
        <h1><?= $post->title; ?></h1>

        <div>
            <?= $post->body; ?>
        </div>
``` 

