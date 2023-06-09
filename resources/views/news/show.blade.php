@extends('layouts.app')

@section('content')
<div class="card mb-3" style="width: 50rem;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ \App\Http\Helpers\Helper::getPath('news',$news->image) }}" class="card-img-top" alt="" width="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h1 style="color: red" class="card-title">Personal information</h1>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Title:</b> {{ $news->title }}</li>
                <li class="list-group-item"><b>Content:</b> {{ $news->content }}</li>
                <li class="list-group-item"><b>Author:</b> {{ $news->user->name }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection