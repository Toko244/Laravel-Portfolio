@extends('admin.admin_master')

@section('admin')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Editable Table</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Editable Table</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Datatable Editable</h4>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr style="cursor: pointer;">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($multiImage as $image)
                                <tr data-id="1" style="cursor: pointer;">
                                    <td data-field="id" style="width: 80px">{{ $image->id }}</td>
                                    <td data-field="name"><img class="image_for_admin" src="{{ asset($image->images) }}" alt=""></td>
                                    <td data-field="age">{{ $image->created_at }}</td>
                                    <td style="width: 100px">
                                        <a href="{{ route('delete.multi.image', $image->id) }}" id="delete" class="delete_button btn btn-danger" title="Edit">
                                            <i class="fas ri-delete-bin-line"></i>
                                        </a>
                                        <a href="{{ route('edit.multi.image', $image->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>

@endsection
