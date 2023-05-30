@extends('admin.admin_master')

@section('admin')

<form action="{{ route('update.multi.image', $image->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Edit Multi Images</label>
        <div>
            <input type="file" id="image" class="form-control" name="image">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label></label>
        <div class="col-sm-10">
            <img src="{{ (!empty($image->images))? url($image->images): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
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
