@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <button class="btn btn-info">
            <a href="{{ route('categories.create') }}">Add News</a>
        </button>
    </div>
</nav>
@if( session('message') != null)
<div class="text-danger">{{ session('message') }}</div>
@endif
@if( session('success' ))
<div class="alert alert-success text-white" role="alert">
    {{ session('success') }}
</div>
@endif
<table class="table table-hover">
    <thead>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Parent_id</th>
        <th scope="col">Action</th>
    </thead>
    <tbody>
        @foreach ($categories as $item)
        <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>
                @if($item->parent_id)
                {{$item->parent->name}}
                @else
                Không có
                @endif
            </td>
            <td>
                <a class="btn btn-primary" href="{{ asset('categories/'.$item->id.'/edit') }}">Edit</a>
                <a class="btn btn-success" href="{{ asset('categories/'.$item->id) }}">Detail</a>
                <form action="{{ route('categories.destroy', ['category' => $item->id]) }}" method="post">
                    @csrf
                    @method( 'Delete' )
                    <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Do you really want to delete?')" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@endsection