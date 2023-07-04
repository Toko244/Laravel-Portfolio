@extends('admin.admin_master')

@section('admin')

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <img class="rounded-circle avatar-xl" src="{{ (!empty($profileData->photo)) ? url($profileData->photo) : url('uploads/no_image.jpg') }}" alt="profile">
                            <span class="h4 ms-3 ">{{ $profileData->username }}</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        <p class="text-muted">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $profileData->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $profileData->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $profileData->address }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.profile.update', Auth::user()->id) }}" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" name="username" value="{{ $profileData->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" name="name" value="{{ $profileData->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" name="email" value="{{ $profileData->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" name="phone" value="{{ $profileData->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" name="address" value="{{ $profileData->address }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Profile Image</label>
                                    <input type="file" name="photo" class="form-control" id="image">
                                </div>

                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label"></label>
                                        <img class="rounded-circle avatar-xl" id="showImage" src="{{ (!empty($profileData->photo)) ? url($profileData->photo) : url('uploads/no_image.jpg') }}" alt="profile">
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->

</div>


@endsection
