<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use Faker\Provider\Lorem;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use App\Models\Category;

use function PHPUnit\Framework\isEmpty;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return view('Home',[
        'title' => "Home",
        'active' => 'home'
    ]);
});

Route::get('/home', function () { 
    return view('Home',[
        'title' => "Home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'active' => 'about',
        'nama' => 'koir herianto',
        'nim' => 'H191600499',
        'gambar' => 'kucingx.jpeg'
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class,'singlePost']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');
// Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show');

Route::get('/categories/',function(){
    return view('categories',[
        'title' => 'All Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});
Route::get('/authors/',function(){
    return view('Posts',[
        'title' => 'All Authors',
        'active' => 'post',
        'posts' => User::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'title' => 'Post By Category: ' . $category->name,
//         'active' => 'categories',
//         'posts'  => $category->post,
//     ]);
// });

// Route::get('/authors/{author:username}',function (User $author){
//     return view('Posts',[
//         'title' => 'Post by Author: ' . $author->name,
//         'active'=> '',
//         'posts'  => $author->post->load(['author','category'])
//     ]);
// });



