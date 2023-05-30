@extends('admin.admin_master')

@section('admin')

<div class="card">
    <div class="card-body">
        <div class="d-flex mb-4">
            <div class="flex-1">
                <h5 class="font-size-14 my-1">{{ $contact->name }}</h5>
                <small class="text-muted">{{ $contact->email }}</small>
            </div>
        </div>

        <h4 class="font-size-16" style="color: blue;">Subject : {{ $contact->subject }}</h4>

        <p>{{ $contact->message }}</p>
        <hr>

        <a href="mailto:{{ $contact->email }}" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
        <a href="{{ route('admin.contact.destroy', $contact->id) }}" id="delete" class="btn btn-danger waves-effect mt-4"> <i class="fas ri-delete-bin-line"></i> Delete</a>
    </div>

</div>

@endsection
