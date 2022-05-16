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
                    <div class="form-group">
                        <input type="search" class="form-control form-outline" placeholder="Search of category" aria-label="Search" name="keyword" value="">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-search fa-sm"></i> </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('categories.create') }}" class="btn btn-danger">CREATE</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-1">No.</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ asset('categories/'.$category->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Detail</a>
                                <a href="{{ asset('categories/'.$category->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="float-right">
                    {{ $categories->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection