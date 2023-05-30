@extends('admin.admin_master')

@section('admin')

<div class="page-wrapper">
    <div class="card-body">
        <form action="{{ route('send.user.email', $contact->id) }}" class="custom-validation" method="POST" enctype="multipart/form-data">
            @csrf

            <center>
                <h5>Mail To : {{ $contact->email }}</h5>
            </center>

            <div class="mb-3">
                <label>Email Greeting</label>
                <div>
                    <input type="text" class="form-control" value="" name="greeting" data-parsley-minlength="6" placeholder="Min 6 chars.">
                </div>
            </div>
            <div class="mb-3">
                <label>Email First Line</label>
                <div>
                    <input type="text" class="form-control" value="" name="first_line" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                </div>
            </div>
            <div class="mb-3">
                <label>Email Body</label>
                <div>
                    <input type="text" class="form-control" value="" name="body" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                </div>
            </div>
            <div class="mb-3">
                <label>Email Button Name</label>
                <div>
                    <input type="text" class="form-control" value="" name="button" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                </div>
            </div>
            <div class="mb-3">
                <label>Email URL</label>
                <div>
                    <input type="text" class="form-control" value="" name="url" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                </div>
            </div>
            <div class="mb-3">
                <label>Email Last Line</label>
                <div>
                    <input type="text" class="form-control" value="" name="last_line" data-parsley-maxlength="6" placeholder="Max 6 chars.">
                </div>
            </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Send Message
                    </button>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection
