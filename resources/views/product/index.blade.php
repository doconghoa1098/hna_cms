@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="mb-2 text-gray-800">Products Table</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <form class="d-sm-inline-block form-inline mr-auto my-2 my-md-0 ">
                <div class="input-group">
                    <input type="text" class="form-control form-outline" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                    </div>
                </div>
            </form>
            <a href="#" class="btn btn-danger">CREATE</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-1">No.</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3">Code</th>
                            <th class="col-sm-2">Image</th>
                            <th class="col-sm-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ (($products->currentPage()-1)*config('common.default_page_size')) + $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>
                                <img src="{{asset('storage/images/products/' . $product->image)}}" class="img-fluid">
                            </td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Detail</a>
                                <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="float-right">
                    {{ $products->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection