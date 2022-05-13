@extends('layouts.app')

@section('content')

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
    @if( session('message') != null )
        <div class="text-danger">{{ session('message') }}</div>
    @endif
    @if ( session('success' ))
        <div class="alert alert-success text-white" role="alert">
            {{ session('success') }}
        </div>
    @endif
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
                    <td scope="row">{{ (($news->currentPage()-1)*config('common.default_page_size')) + $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>
                        <img src="{{asset('storage/' . $item->image)}}" width="120">
                    </td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ asset('news/'.$item->id.'/edit') }}">Edit</a>
                        <a class="btn btn-success" href="{{ asset('news/'.$item->id) }}">Detail</a>
                        {{-- <form action="{{ route('news.destroy', ['news' => $item->id]) }}" method="post">
                            @csrf
                            @method( 'Delete' )
                            <input type="submit" class="btn btn-danger"  value="Delete" onclick="return confirm('Do you really want to delete?')"/>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{ $news->links() }}
@endsection