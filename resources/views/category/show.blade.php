@extends('layouts.app')

@section('content')
<div class="card mb-3" style="width: 50rem;">
    <div class="row g-0">
        <div class="col-md-4">
            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                @csrf
                @method( 'Delete' )
                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Do you really want to delete?')" />
            </form>

            <h1 style="color: red" class="card-title text-center">Categories</h1>
        </div>
        <div class="col-md-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Name:</b> {{ $category->name }}</li>
                <li class="list-group-item"><b>Parent:</b> @if($category->parent !=null) {{ $category->parent->name }}
                    @else No!
                    @endif
                </li>
                <li class="list-group-item"><b>Create:</b> {{ $category->created_at }}</li>
                <li class="list-group-item"><b>Update:</b> {{ $category->updated_at }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection