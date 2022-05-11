<form action="" method="get">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Search: </label>
                <input type="text" name="keyword" class="form-control">
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-sm btn-primary" type="submit">Save</button>
        </div>
    </div>
</form>
@if(session('message') != null)
        <div class="text-danger">{{ session('message') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-white" role="alert">
            {{ session('success') }}
        </div>
    @endif
<table>
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Parent_id</th>
        <th>Action</th>
        <th>
            <a href="{{route('categories.create')}}">Add Categories</a>
        </th>
    </thead>
    <tbody>
        @foreach ($categories as $item)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->parent_id}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ asset('categories/'.$item->id.'/edit') }}">Edit</a>
                    <a class="btn btn-success" href="{{ asset('categories/'.$item->id) }}">Detail</a>
                    <form action="{{ route('categories.destroy', ['category' => $item->id]) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" class="btn btn-danger"  value="Delete" onclick="return confirm('Do you really want to delete?')"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}