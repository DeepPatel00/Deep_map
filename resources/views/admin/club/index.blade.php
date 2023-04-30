@extends('admin.common')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        @include('flash_message')
        @yield('flash_message')
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    {{ $page_title }}
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-status-top bg-primary"></div>
                    <div class="card-header">
                        <h3 class="card-title">Create</h3>
                    </div>
                    <form action="{{ URL::to('/') }}/admin/save-club" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Advisor <span class="text-danger">*</span></label>
                                        <input name="advisor" placeholder="Enter Advisor" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Advisor Email <span class="text-danger">* </span></label>
                                        <input name="email" type="email" placeholder="Enter Advisor Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Time <span class="text-danger">*</span></label>
                                        <input name="time" class="form-control" type="time" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Date <span class="text-danger">* </span></label>
                                        <input name="date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Longitude <span class="text-danger">* </span></label>
                                        <input name="longitude" placeholder="Enter Location" type="number" step="any" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Latitude <span class="text-danger">* </span></label>
                                        <input name="latitude" type="number" step="any" placeholder="Enter Location" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Logo <span class="text-danger">* </span></label>
                                        <input type="file" name="logo" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" placeholder="Enter Description" id="description" required></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="me-3 btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection