@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <marquee direction="right">HNA_CMS</marquee>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-gray-800">Top 10 News</h3>
        <a href="{{ route('news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add News</a>
    </div>
    <div class="row">
        @foreach($news as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $item->title }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('news',$item->image) }}" width="120">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-gray-800">Top 10 Users</h3>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add User</a>
    </div>
    <div class="row">
        @foreach($users as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $item->name }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->isAdmin($item->role) }}</div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('users',$item->image) }}" width="120">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-gray-800">Top 10 Products</h3>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Product</a>
    </div>
    <div class="row">
        @foreach($products as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $item->name }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->price }}</div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('products',$item->image) }}" width="120">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection