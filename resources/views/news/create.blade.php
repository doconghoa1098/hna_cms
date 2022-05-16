@extends('layouts.app')

@section('content')
<form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Author</label>
                <select name="author_id" class="form-control">
                    @foreach($users as $c)
                    <option @if($c->id == old('author_id')) selected @endif value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Title: </label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Content: </label>
                <input type="text" name="content" class="form-control" value="{{old('content')}}">
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image: </label>
                <input type="file" name="file_upload" class="form-control">
                @error('file_upload')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</form>
@endsection