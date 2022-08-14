<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //homr
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //halaman input data
    public function create()
    {
        //return request()->post();
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //mengirim input data
    public function store(Request $request)
    {
        // ddd($request);
        // return $request->file('image')->store('post-images');
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug'  => 'required|max:255|unique:posts,slug',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body'  => 'required|min:100'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['category_id'] = (int)$validateData['category_id'];
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success','New Post Hasbeen added');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    //halaman detail
    public function show(post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    //halaman edit
    public function edit(post $post)
    {
        // return $post;
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    //mengirim/menerapkan hasil editan
    public function update(Request $request, post $post)
    {
        if ($request->slug == $post->slug) {
            $slug = 'required|max:255';
        }else{
            $slug = 'required|max:255|unique:posts,slug';
        }

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug'  => $slug,
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body'  => 'required|min:100'
        ]);

        //jika gambarnya ada
        if ($request->file('image')) {
            //hapus gambar lama jika ada yang baru
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['category_id'] = (int)$validateData['category_id'];
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::where('id',$post->id)->update($validateData);

        return redirect('/dashboard/posts')->with('success','Post has benn updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image){
            storage::delete($post->image);
        }
        
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Post Hasbeen deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        
        return response()->json(['slug' => $slug]);
    }
}
