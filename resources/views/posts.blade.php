@extends('layout.main')

@section('container')
@php
    
@endphp

    <h1 class="my-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-2">
        <div class="col-md-6">
            <form action="/posts" method="get">
                <div class="input-group mb-3">
                    <input name="search" type="text" value="{{ request('search') }}" class="form-control" placeholder="Search..." aria-label="Search..." >
                    @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @elseif(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>                  
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-4 ">
            <div style="max-height: 350px; overflow:hidden">
            @if ($posts[0]->image)
                <img class="card-img-top" src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" alt="{{ $posts[0]->category->name }}">
            @else
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/03/Mount_Fuji_as_seen_across_lake_Kawaguchi%2C_with_Fujikawaguchiko_town_in_the_foreground_seen_early_in_the_evening._Honshu_Island._Japan.jpg" 
                alt="{{ $posts[0]->category->name }}">
            @endif
            </div>

            <div class="card-body text-center">
            <h3 class="card-title ">
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
            </h3>
            <small class="text-muted">
                By: <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none"> {{ $posts[0]->author->name }}</a>, category 
                <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none" > 
                    {{ $posts[0]->category->name }} 
                </a>
            </small>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $posts[0]->created_at->diffForHumans() }}</small></p>
            <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read More</a>
            </div>
        </div>
    

    
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 my-2">
                <div class="card" >
                        @if ($post->image)
                            <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                        @else
                            <img src="https://as1.ftcdn.net/v2/jpg/01/41/11/64/1000_F_141116428_V5guspEHFFY0a9VvpEiC0QUHDbYyoDD9.jpg" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif
                    <div class="card-body">
                      <h5 class="card-title"> 
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
                      </h5>
                        <h6>
                        By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a>, category 
                       <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none" > 
                           {{ $post->category->name }} 
                       </a>
                        </h6>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/posts/{{ $post->slug }}" class="btn btn-primary">read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

    
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection


