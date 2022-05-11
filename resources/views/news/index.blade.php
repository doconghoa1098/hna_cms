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
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Author</th>
        <th>Action</th>
        <th>
            <a href="{{route('news.create')}}">Add News</a>
        </th>
    </thead>
    <tbody>
        @foreach ($news as $item)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td>
                    <img src="{{asset('storage/' . $item->image)}}" width="70">
                </td>
                <td>{{$item->user->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ asset('news/'.$item->id.'/edit') }}">Edit</a>
                    <a class="btn btn-success" href="{{ asset('news/'.$item->id) }}">Detail</a>
                    <form action="{{ route('news.destroy', ['news' => $item->id]) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" class="btn btn-danger"  value="Delete" onclick="return confirm('Do you really want to delete?')"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $news->links() }}