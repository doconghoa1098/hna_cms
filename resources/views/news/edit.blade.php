@extends('layouts.app')

@section('content')

<form action="{{route('news.update',['news'=>$news->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Title: </label>
        <input type="text" name="title" class="form-control" value="{{old('title', $news->title)}}" >
        @error('title')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="file_upload" class="form-control">
        @error('file_upload')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Content: </label>
        <input type="text" name="content" class="form-control" value="{{old('content', $news->content)}}" >
        @error('content')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Author: </label>
        <select name="author_id" class="form-control" >
            @foreach($users as $item)
            <option 
                @if($item->id == old('author_id', $news->author_id))
                selected
                @endif
            value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@endsection