@extends('admin.admin_master')

@section('admin')
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>
<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('store.blog') }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Blog Category Name</label>
                <div>
                    <select class="form-select" name="category_name" aria-label="Default select example">
                        <option selected > Open This Select Menu </option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label>Blog Title</label>
                <div>
                    <input type="text" class="form-control" value="" name="title" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Blog Tags</label>
                <div>
                    <input type="text" class="form-control" value="home,tech" name="tags" data-role="tagsinput">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Blog Description</label>
                <div>
                    <textarea id="elm1" name="description" aria-hidden="true"></textarea>
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Blog Image</label>
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
                    <img src="{{ (!empty('/uploads/portfolio/'))? url('uploads/no_image.jpg'): url('uploads/no_image.jpg') }}" id="showImage" alt="" class="rounded avatar-lg">
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
