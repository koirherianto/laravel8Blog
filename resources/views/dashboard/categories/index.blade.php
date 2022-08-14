@extends('dashboard.layout.main')
@section('container')
    <h1 class="my-2">Admin Category</h1>
    <a href="/dashboard/categories/create" class="btn btn-success mb-2 my-2"> Create Category</a>

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
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
            <td> {{ $loop->iteration }}</td>
            <td> {{ $category->name }}</td>
            <td> 
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning py-0 d-inline mx-1">Edit</a>
              <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Delete This Category?')" class="btn btn-danger py-0">Delete</button>
              </form>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection