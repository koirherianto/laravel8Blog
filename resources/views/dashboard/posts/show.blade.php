@extends('dashboard.layout.main')
@section('container')

<div class="container">
    <div class="row justify-content-left mt-3">
        <div class="col-lg-10">
            <H1 class="mb-3">{{ $post->title }}</H1>
                
            <a href="/dashboard/posts" class="btn btn-info my-2 py-1 text-light d-inline">Back To My Post</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning my-2 py-1 text-light ">Edit Post</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Delete This Page?')" class="btn btn-danger py-1">Delete Post</button>
              </form>
            <div style="max-height: 350px; overflow:hidden">
              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image ) }}" class="img-fluid" alt="{{ $post->category->name }}">
              @else
                <img src="https://as1.ftcdn.net/v2/jpg/01/41/11/64/1000_F_141116428_V5guspEHFFY0a9VvpEiC0QUHDbYyoDD9.jpg" class="img-fluid" alt="{{ $post->category->name }}">
              @endif
            </div>
            <article class="my-2 fs-5">{!! $post->body !!}</article>
        </div>
    </div>
</div>

@endsection