@extends('dashboard.layout.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Blog Post {{ auth()->user()->name }} </h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>

    <a href="/dashboard/posts/create" class="btn btn-success mb-2"> Write a Post</a>

    <div class="table-responsive col-lg-10">
      @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
      <table class="table table-striped table-sm m-1">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
            <td> {{ $loop->iteration }}</td>
            <td> {{ $post['title'] }}</td>
            <td> {{ $post->category->name }}</td>
            <td> 
              <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info py-0 d-inline">Detail</a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning py-0 d-inline mx-1">Edit</a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Delete This Page?')" class="btn btn-danger py-0">Delete</button>
              </form>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection