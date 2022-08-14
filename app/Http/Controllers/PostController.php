<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller{
    public function index(){
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug',request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username',Request('author'));
            $title = ' by ' . $author->name;
        }

        // dd(request('search'));
        return view('posts',[
            'title' => 'All Post' . $title,
            'active' => 'blog',
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
        ]);
    }

    public function singlePost(Post $post){
        
        return view('singlePost',[
            'title' => 'Single Post',
            'active' => 'blog',
            'post'  => $post
        ]);
    }

    // public function category(Category $category){
    //     return view();
    // }
}
