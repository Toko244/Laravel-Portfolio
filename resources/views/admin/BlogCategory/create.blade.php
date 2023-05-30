@extends('admin.admin_master')

@section('admin')

<form action="{{ route('store.category') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Add Blog Category</label>
        <div>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                Submit
            </button>
        </div>
    </div>
</form>

@endsection
