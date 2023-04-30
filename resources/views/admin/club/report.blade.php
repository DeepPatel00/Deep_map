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
                    <div class="card-header justify-content-between">
                        <h3 class="card-title">Report</h3>
                        <a class="btn btn-primary btn-icon" href="{{ URL::to('/') }}/admin/create-club">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="codeReport" class="table card-table table-vcenter text-center text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Advisor</th>
                                    <th>Advisor Email</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Logo</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $data)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td> <a href="{{ URL('/') }}/admin/club-edit/{{ $data->id }}" class="btn btn-orange btn-icon" aria-label="Edit">
                                            <i class="ti ti-edit"></i>Edit
                                        </a>
                                        <a href="{{ URL('/') }}/admin/club-delete/{{ $data->id }}" onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-icon" aria-label="Delete">
                                            <i class="ti ti-trash"></i>Delete
                                        </a>
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->advisor}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{ mb_strimwidth($data->description ?? "---", 0, 20, "...") }}</td>
                                    <td>{{ date("h:i:sa",strtotime($data->time)); }}</td>
                                    <td>{{$data->date}}</td>
                                    <td>{{ mb_strimwidth($data->longitude ?? "---", 0, 20, "...") }}</td>
                                    <td>{{ mb_strimwidth($data->latitude ?? "---", 0, 20, "...") }}</td>
                                    <td><a href="{{ URL('/') }}/public/club/{{ $data->logo }}" target="_blank" class="btn btn-success btn-icon" aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M15 8h.01"></path>
                                                <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z"></path>
                                                <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                                <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                            </svg>
                                        </a></td>                                   
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->updated_at}}</td>
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