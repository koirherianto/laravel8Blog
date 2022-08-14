<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\models\Post;
use \App\models\Category;
use \App\models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Post::factory(20)->create();
        Category::factory(5)->create();

        User::create([
            'name'  => 'admin',
            'username'  => 'koirherinto',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('admin'),
            'isAdmin' => true
        ]);

        // Category::created([
        //     'name'  => 'Android',
        //     'slug'  => 'android'
        // ]);
        
        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);
        
        // Category::created([
        //     'name'  => 'Web Programing',
        //     'slug'  => 'web-programing'
        // ]);

        

        // Post::create([
        //     'category_id' => 1,
        //     'user_id'   => 1,
        //     'title'     => 'Judul Pertama',
        //     'slug'      => 'judul-pertama',
        //     'excerpt'   => 'Lorem ipsum pertama dolor sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium',
        //     'body'      =>  '<p> Lorem ipsum pertama sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium labore dolores,</p><p> magni laudantium pariatur delectus alias iure consequatur voluptate tempore libero minima sequi tempora sed corporis distinctio facere placeat! Voluptatum, esse praesentium. Consequuntur ducimus ex quisquam quis maxime placeat quas alias, rem a velit! Doloremque consequuntur, excepturi necessitatibus deserunt cum ea perspiciatis voluptatem soluta, praesentium illum voluptatibus, natus consectetur odio voluptas. Eveniet incidunt quis perferendis natus itaque ducimus laboriosam praesentium ullam aliquid nam cupiditate consequatur inventore, eius deleniti numquam asperiores ex commodi provident, molestias aut, esse atque. Impedit obcaecati vitae laborum eum dolorum! Voluptate id est, dolorem natus ducimus delectus ratione temporibus quae sint in, aperiam atque, possimus quasi sequi!</p>'
        // ]);

        // Post::create([
        //     'category_id' => 1,
        //     'user_id'   => 1,
        //     'title'     => 'Judul Kedua',
        //     'slug'      => 'judul-kedua',
        //     'excerpt'   => 'Lorem ipsum kedua dolor sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium',
        //     'body'      =>  '<p> Lorem ipsum kedua sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium labore dolores,</p><p> magni laudantium pariatur delectus alias iure consequatur voluptate tempore libero minima sequi tempora sed corporis distinctio facere placeat! Voluptatum, esse praesentium. Consequuntur ducimus ex quisquam quis maxime placeat quas alias, rem a velit! Doloremque consequuntur, excepturi necessitatibus deserunt cum ea perspiciatis voluptatem soluta, praesentium illum voluptatibus, natus consectetur odio voluptas. Eveniet incidunt quis perferendis natus itaque ducimus laboriosam praesentium ullam aliquid nam cupiditate consequatur inventore, eius deleniti numquam asperiores ex commodi provident, molestias aut, esse atque. Impedit obcaecati vitae laborum eum dolorum! Voluptate id est, dolorem natus ducimus delectus ratione temporibus quae sint in, aperiam atque, possimus quasi sequi!</p>'
        // ]);

        // Post::create([
        //     'category_id' => 2,
        //     'user_id'   => 2,
        //     'title'     => 'Judul Ketiga',
        //     'slug'      => 'judul-ketiga',
        //     'excerpt'   => 'Lorem ipsum ketiga dolor sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium',
        //     'body'      =>  '<p> Lorem ipsum ketiga sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium labore dolores,</p><p> magni laudantium pariatur delectus alias iure consequatur voluptate tempore libero minima sequi tempora sed corporis distinctio facere placeat! Voluptatum, esse praesentium. Consequuntur ducimus ex quisquam quis maxime placeat quas alias, rem a velit! Doloremque consequuntur, excepturi necessitatibus deserunt cum ea perspiciatis voluptatem soluta, praesentium illum voluptatibus, natus consectetur odio voluptas. Eveniet incidunt quis perferendis natus itaque ducimus laboriosam praesentium ullam aliquid nam cupiditate consequatur inventore, eius deleniti numquam asperiores ex commodi provident, molestias aut, esse atque. Impedit obcaecati vitae laborum eum dolorum! Voluptate id est, dolorem natus ducimus delectus ratione temporibus quae sint in, aperiam atque, possimus quasi sequi!</p>'
        // ]);
    }
}
