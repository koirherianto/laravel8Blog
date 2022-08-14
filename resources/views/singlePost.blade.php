@extends('layout.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <H1 class="mb-3">{{ $post->title }}</H1>
                    
                <h5>By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a>, category 
                    <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}"> 
                        {{ $post->category->name }} 
                    </a>
                    <img src="" alt="">
                </h5>
                @if ($post->image)
                    <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                @else
                    <img src="https://as1.ftcdn.net/v2/jpg/01/41/11/64/1000_F_141116428_V5guspEHFFY0a9VvpEiC0QUHDbYyoDD9.jpg" class="img-fluid" alt="{{ $post->category->name }}">
                @endif
                
                <article class="my-2 fs-5">{!! $post->body !!}</article>
                
                <a href="/posts" class="mt-2 d-block">Kembali</a>
            </div>
        </div>
    </div>

 
@endsection

