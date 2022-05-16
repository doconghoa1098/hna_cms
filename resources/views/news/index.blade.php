@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <button class="btn btn-info">
                <a href="{{ route('news.create') }}">Add News</a>
            </button>
        </div>
    </nav>
    <table class="table table-hover">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($news as $item)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>
                    <img src="{{ \App\Http\Helpers\Helper::getPath('news',$item->image) }}" width="120">
                </td>
                <td>{{ $item->user->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ asset('news/'.$item->id.'/edit') }}">Edit</a>
                    <a class="btn btn-success" href="{{ asset('news/'.$item->id) }}">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $news->links() }}
</div>

@endsection