@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Edit Category</h4>
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <form action="{{ route('categories.update',['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" class="form-control" placeholder="Name Categories" value="{{ old('name',$categoryParentFind->name) }}" name="name">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Parent</label>
                                <select class="form-control select2" name="parent_id" data-toggle="select2">
                                    <option>Select parent</option>
                                    @foreach($categoryParents as $categoryParent)
                                    <option <?= ($categoryParent->id == $categoryParentFind->parent_id) ? "selected" : "" ?> value="{{ $categoryParent->id }}">{{ $categoryParent->name }}</option>
                                    @foreach($categoryParent->children as $childrenCategory)
                                    <option <?= ($categoryParentFind->parent_id == $childrenCategory->id) ? "selected" : "" ?> value="{{ $childrenCategory->id }}">{{ $categoryParent->name }}/{{ $childrenCategory->name }}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                                @if ($errors->has('parent_id'))
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $errors->first('parent_id') }}
                                </div>
                                @endif
                            </div>
                            <button class="btn btn-success" type="submit">Update</button>
                            <button class="btn btn-danger" type="submit">Cancel</button>
                        </form>
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@endsection