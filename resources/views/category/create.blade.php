@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Name: </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Parent category: </label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Parent</option>
                        @foreach($categoryParents as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @if($item->children)
                                @foreach( $item->children as $item)
                                    <option value="{{ $item->id }}"> -- {{ $item->name }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection