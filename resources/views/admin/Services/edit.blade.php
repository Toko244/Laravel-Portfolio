@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('update.service', $service->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Service Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $service->title }}" name="title" id="">
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Service Short Description</label>
                <div>
                    <textarea class="form-control" name="short_description" aria-hidden="true">{{ $service->short_description }}</textarea>
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Service Description</label>
                <div>
                    <textarea id="elm1" name="description" aria-hidden="true">{{ $service->description }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Service Image</label>
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
                    <img src="{{ (!empty('/uploads/services/'.$service->image))? url($service->image): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
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
