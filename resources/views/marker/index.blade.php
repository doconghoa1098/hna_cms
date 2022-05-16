@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="mb-2 text-gray-800">List Markers</h3>
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
            <a href="{{ route('markers.create') }}" class="btn btn-danger">CREATE</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($markers as $val)
                        <tr>
                            <td>{{ $val->id }}</td>
                            <td>{{ $val->code }}</td>
                            <td>{{ $val->name }}</td>
                            <td><img src="{{ \App\Http\Helpers\Helper::getPath('markers',$val->image) }}" alt="" style="width: 100px; height: 100px"></td>
                            <td>
                                <a class="btn btn-primary" href="{{ asset('markers/'.$val->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('markers.destroy', ['marker' => $val->id]) }}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <input type="submit" class="btn btn-success" value="Delete" onclick="return confirm('Do you really want to delete?')" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="float-right">
                    {{ $markers->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection