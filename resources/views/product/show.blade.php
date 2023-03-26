@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between">
        <h3 class="mb-2 text-gray-800">Products Detail</h3>
        <h6 aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </h6>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-backward"></i> Back</a>
            <div class="d-flex">
                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> Edit</a>
                <!-- <button class="btn btn-info btn-sm" type="reset"><i class="fas fa-trash"></i> Delete</button> -->
                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                    @csrf
                    @method( 'Delete' )
                    <input type="submit" class="btn btn-info btn-sm" value="Delete" onclick="return confirm('Do you really want to delete?')" />
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Product image -->
                    <a href="javascript: void(0);" class="text-center d-block mb-4">
                        <img src="{{ \App\Http\Helpers\Helper::getPath('products', $product->image) }}" class="img-fluid w-75" alt="Product-img" />
                    </a>

                    <div class="d-lg-flex d-none justify-content-center">
                        <a href="javascript: void(0);">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('products', $product->image) }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                        </a>
                        <a href="javascript: void(0);" class="ms-2">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('products', $product->image) }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                        </a>
                        <a href="javascript: void(0);" class="ms-2">
                            <img src="{{ \App\Http\Helpers\Helper::getPath('products', $product->image) }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                        </a>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="mt-0 mb-3">Comments (258)</h4>
                            <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" rows="5"></textarea>
                            <div class="d-flex justify-content-end">
                                <div class="btn-group mb-2 mr-2">
                                    <button type="button" class="btn btn-link btn-sm"><i class="fa-solid fa-paperclip"></i></button>
                                </div>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <h3 class="mt-0">{{ $product->name }}</h3>
                    <p class="mb-1">Added Date: {{ $product->created_at }}</p>
                    <p class="mb-1">Updated Date: {{ $product->updated_at }}</p>
                    <p class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </p>
                    <div class="mt-3">
                        <span class="p-1 bg-gradient-danger text-white rounded ">Instock </span>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Retail Price:</h6>
                                <p class="font-weight-bold"> ${{ $product->price }}</p>
                            </div>
                            <div class="col-md-4">
                                <h6>Quantity: </h6>
                                <p class="font-weight-bold">10,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Maker:</h6>
                                <p class="font-weight-bold"> {{ $product->maker->name }}</p>
                            </div>
                            <div class="col-md-8">
                                <h6>Categories:</h6>
                                <p class="font-weight-bold d-flex flex-wrap">
                                    @foreach ($product->category as $value)
                                    <span class="p-1 m-1 bg-gradient-info text-white rounded ">{{ $value->name }}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h6>Description:</h6>
                        <p>{!! $product->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection