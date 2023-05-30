@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('footer.update', $footer->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Footer Number</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->number }}" name="number" data-parsley-minlength="6" placeholder="Min 6 chars.">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label>Footer Short Description</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->short_description }}" name="short_description" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer address</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->address }}" name="address" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Country</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->country }}" name="country" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Email</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->email }}" name="email" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Facebook</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->facebook }}" name="facebook" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Twitter</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->twitter }}" name="twitter" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Instagram</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->instagram }}" name="instagram" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label>Footer Linkedin</label>
                <div>
                    <input type="text" class="form-control" value="{{ $footer->linkedin }}" name="linkedin" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('short_description')
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

    </div>

</div>

@endsection
