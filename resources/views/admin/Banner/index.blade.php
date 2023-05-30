@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('banner.update', $banner->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Banner Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $banner->title }}" name="title" data-parsley-minlength="6" placeholder="Min 6 chars.">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label>Banner Short Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $banner->short_title }}" name="short_title" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Banner Video URL</label>
                <div>
                    <input type="text" class="form-control" value="{{ $banner->video_url }}" name="video_url" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Banner Image</label>
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
                    <img src="{{ (!empty('/uploads/banner/'.$banner->image))? url($banner->image): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
                </div>
            </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                    </button>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection
