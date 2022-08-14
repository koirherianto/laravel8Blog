@extends('layout.main')

@section('container')
    
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4 my-2">
                <a href="/posts?category={{ $category->slug }}" class="text-decoration-none text-white">
                <div class="card bg-dark text-white">
                    <img src="https://as1.ftcdn.net/v2/jpg/01/41/11/64/1000_F_141116428_V5guspEHFFY0a9VvpEiC0QUHDbYyoDD9.jpg" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-item-center p-0">
                    <h5 class="card-title text-center flex-fill p-4 fs-3">
                        {{ $category->name }}
                    </h5>
                    </div>
                </div>
                </a>
            </div>
            @endforeach 
        </div>
    </div>
    
    

     {{-- <article>
        <ul>
            <li>
                <a class="text-decoration-none" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
            </li>
        </ul>
     </article>  --}}
    
@endsection