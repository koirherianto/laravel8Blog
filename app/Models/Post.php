<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Catch_;

class Post extends Model{
    use HasFactory;
    use Sluggable;

    //protected $fillable = ['title','excerpt','body'];

    protected $guarded = ['id'];
    protected $with = ['author','category'];

    //nama function harus sama dengan model yang direlasikan
    public function category(){   
        //model post berelasi dengan category (inverse one to many)
        //post dan categori berlasi one to one
        return $this->belongsTo(Category::class) ;
        
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id') ;
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class) ;
    // }

    //parameter query berisi lanjutan panah di controller
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false,function ($query,$search){
            return $query->where('title','like', '%'.$search.'%')
            ->orwhere('body','like', '%'.$search.'%');
        });
        
        $query->when($filters['category'] ?? false, function($query,$category){
            return $query->whereHas('category',function($query) use ($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query,$author) =>
            $query->whereHas('author',fn($query) =>
                $query->where('username',$author)
            )
        );
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}



// Post::create([
//     'title'     => 'Judul Ketiga',
//     'category_id' => 3,
//     'slug'      => 'judul-ketiga',
//     'excerpt'   => 'Lorem ipsum ketiga dolor sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium',
//     'body'      =>  '<p> Lorem ipsum ketiga sit, amet consectetur adipisicing elit. Tempora, magni. Aspernatur repellat doloribus tenetur velit dolorum quidem rem praesentium labore dolores,</p><p> magni laudantium pariatur delectus alias iure consequatur voluptate tempore libero minima sequi tempora sed corporis distinctio facere placeat! Voluptatum, esse praesentium. Consequuntur ducimus ex quisquam quis maxime placeat quas alias, rem a velit! Doloremque consequuntur, excepturi necessitatibus deserunt cum ea perspiciatis voluptatem soluta, praesentium illum voluptatibus, natus consectetur odio voluptas. Eveniet incidunt quis perferendis natus itaque ducimus laboriosam praesentium ullam aliquid nam cupiditate consequatur inventore, eius deleniti numquam asperiores ex commodi provident, molestias aut, esse atque. Impedit obcaecati vitae laborum eum dolorum! Voluptate id est, dolorem natus ducimus delectus ratione temporibus quae sint in, aperiam atque, possimus quasi sequi!</p>'
// ]);


