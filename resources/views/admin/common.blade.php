<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page_title }}</title>

    <link rel="icon" href="{{ URL::to('/') }}/public/backend_assets/static/logo-small.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ URL::to('/') }}/public/backend_assets/static/logo-small.svg" type="image/x-icon" />

    <!-- CSS files -->
    <link href="{{ URL::to('/') }}/public/backend_assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/public/backend_assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/public/backend_assets/dist/css/demo.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/backend_assets/dist/css/style.css">



    {{-- Datatable Css files --}}
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    {{-- jqery file --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Libs Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Libs JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .select2-container {
            /* width: 100% !important; */
        }

        .select2-container--default .select2-selection--single {
            display: block;
            width: 100% !important;
            height: 2.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5 !important;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container--default .select2-selection--multiple {
            width: 100% !important;
            font-size: 0.875rem;
            font-weight: 400;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #90b5e2;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(32 107 196 / 25%);
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            outline: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            line-height: 1.7 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
            top: 0px;
            right: 0px;
            width: 25px;
        }

        #common_table_filter {
            float: right;
            padding-right: 15px;
        }

        #common_table_length {
            padding: 10px 15px;
        }

        .dt-buttons {
            padding: 0px 0px 5px 15px;
        }

        #common_table_info {
            float: left;
            padding: 15px;
        }

        #common_table_paginate {
            float: right;
            padding: 10px 15px;
        }
    </style>

</head>

<body>
    <div class="page">
        <script src="{{ URL::to('/') }}/public/backend_assets/dist/js/demo-theme.min.js"></script>
        @include('admin.common.header')
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center">
                        <div class="col-12 mt-3">
                            <!--<ul class="list-inline list-inline-dots mb-0">-->
                            <!--    <li class="list-inline-item">-->
                            <!--        Copyright &copy; {{ date('Y') }}-->
                            <!--        <a href="https://www.ragingdevelopers.com/" target="_blank" class="link-secondary">Raging-->
                            <!--            Developers</a>.-->
                            <!--        All rights reserved.-->
                            <!--    </li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Libs -->
    <script src="{{ URL::to('/') }}/public/backend_assets/dist/libs/tinymce/tinymce.min.js" defer></script>

    </script>
    <!-- Tabler Core -->
    <script src="{{ URL::to('/') }}/public/backend_assets/dist/js/tabler.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/dist/js/demo.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
    </script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/jszip/jszip.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ URL::to('/') }}/public/backend_assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    @yield('page_script')
    <script>
        $(function() {
            $("#common_table").DataTable({
                    // "bSort" : false,
                    "responsive": false,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "excel", "pdf", "print", "colvis"]
                })
                .buttons().container().appendTo('#common_table_wrapper .col-md-6:eq(0)');
            $("#common_table_wrapper .row:eq(0)").css({
                "align-items": "center",
                // "padding": "10px 15px"
            });
            $("#common_table_wrapper .row:eq(2)").css({
                "align-items": "center",
                // "padding": "10px 15px"
            });
        })
    </script>
</body>

</html>