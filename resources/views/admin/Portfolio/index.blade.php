@extends('admin.admin_master')

@section('admin')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatable_length"><label>Show <select
                                            name="datatable_length" aria-controls="datatable"
                                            class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form action="{{ route('admin.search.portfolio') }}">
                                    <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" name="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="datatable"></label></div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable"
                                    class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                        <tr style="cursor: pointer;">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($portfolio as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! Str::limit($item->description, 100) !!}</td>
                                            <td><img class="image_for_admin" src="{{ asset($item->image) }}" alt=""></td>
                                            <td style="width: 100px">
                                                <a href="{{ route('delete.portfolios', $item->id) }}" id="delete" class="delete_button btn btn-danger" title="Edit">
                                                    <i class="fas ri-delete-bin-line"></i>
                                                </a>
                                                <a href="{{ route('edit.portfolios', $item->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatable-buttons_info" role="status"
                                    aria-live="polite"></div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                {{ $portfolio->links('vendor.pagination.custom') }}
                            </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
