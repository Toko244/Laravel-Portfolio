@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('about.update', $about->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>About Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $about->title }}" name="title" data-parsley-minlength="6" placeholder="Min 6 chars.">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label>About Short Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $about->short_title }}" name="short_title" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>About Short Description</label>
                <div>
                    <textarea class="form-control" name="short_description" rows="5">{{ $about->short_description }}</textarea>
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>About Long Description</label>
                <div>
                    <textarea id="elm1" name="long_description" aria-hidden="true">{{ $about->long_description }}</textarea>
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>About Image</label>
                <div>
                    <input type="file" id="image" class="form-control" name="image">
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">s
                <label></label>
                <div class="col-sm-10">
                    <img src="{{ (!empty('/uploads/about/'.$about->image))? url($about->image): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
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
