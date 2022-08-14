@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" class="mb-5">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label> 
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
              @error('name')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label> 
                <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
</div>

<script>
    const title = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    // title.addEventListener('change',function(){
    //     fetch('/dashboard/categories/checkSlug?name=' + title.value)
    //         .then(response => response.json())
    //         .then(data => slug.value = data.slug)
    // });
    title.addEventListener('change',function(){
        slug.value = generateSlug(title.value);
    });

    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }

</script>

@endsection