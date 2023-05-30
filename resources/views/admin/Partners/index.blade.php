@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('partner.update', $partner->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>partner Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $partner->title }}" name="title" data-parsley-minlength="6" placeholder="Min 6 chars.">
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label>partner Short Title</label>
                <div>
                    <input type="text" class="form-control" value="{{ $partner->about_for_partners }}" name="about_for_partners" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                    @error('about')
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

    </div>

</div>

@endsection
