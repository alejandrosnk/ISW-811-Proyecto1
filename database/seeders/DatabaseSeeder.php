<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user=User::factory()->create();

        $personal=Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);
        $family=Category::create([
            'name'=>'Family',
            'slug'=>'family'
        ]);
        $work=Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'My Family post',
            'slug'=>'my-first-post',
            'excerpt'=>'<p>Lorem ipsum dolor sit amet.</p>',
            'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda qui amet consectetur obcaecati. Laudantium sequi facere illo asperiores dolorem aut reprehenderit vitae repudiandae soluta. Libero nostrum ipsa facere aliquam iste.</p>'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title'=>'My Work post',
            'slug'=>'my-work-post',
            'excerpt'=>'<p>Lorem ipsum dolor sit amet.</p>',
            'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda qui amet consectetur obcaecati. Laudantium sequi facere illo asperiores dolorem aut reprehenderit vitae repudiandae soluta. Libero nostrum ipsa facere aliquam iste.</p>'
        ]);
    }
}
