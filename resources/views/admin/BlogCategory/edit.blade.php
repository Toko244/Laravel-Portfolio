@extends('admin.admin_master')

@section('admin')

<form action="{{ route('update.category', $blogCategory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Edit Blog Category</label>
        <div>
            <input type="text" value="{{ $blogCategory->name }}" class="form-control" name="name">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                Update
            </button>
        </div>
    </div>
</form>

@endsection
