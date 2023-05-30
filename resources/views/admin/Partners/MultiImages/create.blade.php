@extends('admin.admin_master')

@section('admin')

<form action="{{ route('store.multi.partner.image') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Add Multi Images</label>
        <div>
            <input type="file" id="image" multiple="" class="form-control" name="image[]">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label></label>
        <div class="col-sm-10">
            <img src="{{ (!empty('/uploads/partners/'))? url('uploads/no_image.jpg'): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
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
