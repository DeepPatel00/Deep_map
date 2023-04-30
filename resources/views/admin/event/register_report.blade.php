@extends('admin.common')
@section('content')
<style>
    #codeReport_filter {
        float: right;
        padding-right: 15px;
    }

    #codeReport_length {
        padding: 10px 15px;
    }

    .dt-buttons {
        padding: 0px 0px 5px 15px;
    }

    #codeReport_info {
        float: left;
        padding: 15px;
    }

    #codeReport_paginate {
        float: right;
        padding: 10px 15px;
    }
</style>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        @include('flash_message')
        @yield('flash_message')
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                   Register Report
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
                    <div class="card-status-top bg-p rimary"></div>
                    <div class="card-header justify-content-between">
                        <h3 class="card-title">Report</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="codeReport" class="table card-table table-vcenter text-center text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Type</th>
                                    <th>Event/Club</th>
                                    <th>Rsvp No</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $data)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->stype}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->rsvp_no}}</td>
                                    <td>{{$data->sname}}</td>
                                    <td>{{$data->semail}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_script')