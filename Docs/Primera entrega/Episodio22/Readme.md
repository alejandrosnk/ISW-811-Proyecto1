# Episodio 22

## Se crea otro post
## Se coloca esta nomenclatura en el posts.blade :  
```php
{!!$post->title!!}
```

## Tambien se pueden crear posts así: 
```bash
> Post::create(['title'=>'Cuarto post','excerpt'=>'Alugunas cosas ahí','body' =>'Lorem ipsum es
el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final. Aunque no posee actualmente fuentes para justificar sus hipótesis, el profesor de filología clásica']);
```

## Para eso es necesario implementar la base para que los datos esten estructurados: 
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    #En esa variable guarded
    protected $guarded=['id'];
    // protected $fillable=['title','excerpt','body','id'];
}
```

## Para cambiar datos de un post: 
```bash
$post->excerpt = "Changed";
```
## o tambien así: 
``` bash
$post->update(['excerpt'=>'Cambio']);
```
 