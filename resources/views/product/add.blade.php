@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between">
        <h3 class="mb-2 text-gray-800">Products Table</h3>
        <h6 aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </h6>
    </div>
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-backward"></i> Back</a>
                <div>
                    <button class="btn btn-primary btn-sm " type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <button class="btn btn-info btn-sm" type="reset"><i class="fa-solid fa-eraser"></i> Clear</button>
                </div>
            </div>
            <div class="card-body text-dark">
                <div class="form-row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" id="name" class="form-control" name="name">
                            @error('name')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Product Code</label>
                            <input type="text" id="code" class="form-control" name="code">
                            @error('code')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input class="form-control" id="quantity" type="number" name="price">
                            @error('price')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Product Quantity</label>
                            <input class="form-control" id="quantity" type="number" name="quantity">
                            @error('quantity')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" id="product_image" class="form-control py-1" name="product_image">
                            @error('product_image')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_maker" class="form-label">Product Maker</label>
                            <select class="form-control" id="product_maker" name="maker_id">
                                <option value="">Nothing selected</option>
                                @if(isset($makers))
                                @foreach($makers as $maker)
                                <option value="{{ $maker->id }}" {{ \Request::get('maker') == $maker->id ? "selected ='selected'" : "" }}> {{ $maker->name }} </option>
                                @endforeach
                                @endif
                            </select>
                            @error('maker_id')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_categories" class="form-label">Product Categories</label>
                            <select id="product_categories" class="selectpicker border form-control" multiple data-live-search="true" name="category[]">
                                @if(isset($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected ='selected'" : "" }}> {{ $category->name }} </option>
                                @endforeach
                                @endif
                            </select>
                            @error('category')
                            <span class="font-italic text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="10" name="content"></textarea>
                        @error('content')
                        <span class="font-italic text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 pb-4 float-right">
                    <button class="btn btn-primary btn-sm " type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <button class="btn btn-info btn-sm" type="reset"><i class="fa-solid fa-eraser"></i> Clear</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection