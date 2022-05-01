<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BDIOACS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="icon" href="{{ asset('images/logo.jpg')}}">
    <style>
        #header {
            height: 8vh;
            border-radius: 0px;
            display: grid;
            grid-template-columns: 0fr 1fr;
        }
        #imagelogo {
            width: 72px;
            margin-left: 8px;
        }
        #title-page {
            font-weight: bold;
        }
        #title-cont {
            position: absolute;
            height: 100%;
            left: 72px;
            display: grid;
            align-content: center;
            top: 7px;
            left: 85px;
        }
        #inner-container {
            display: grid;
            align-content: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="card w-100" id="header">
        <img src="{{ asset('images/logo.jpg') }}" alt="" id="imagelogo">
        <div id="title-cont">
            <p id="title-page">BDIOACS</p>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="card">
                @if($is_approve)
                <div class="card-body" style="text-align: center;">
                    <div class="alert alert-success w-100" role="alert">
                        Schedule already Approved!
                    </div>
                    Thank You for approving the schedule!
                </div>
                @else
                <div class="card-body" style="text-align: center;">
                    <div class="alert alert-info w-100" role="alert">
                        Schedule Declined!
                    </div>
                    Thank You for using the application!
                </div>
                @endif
            </div>
            <a class="btn btn-primary" href="{{ url('/') }}">Go Home</a>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/chat.js') }}"></script>
</body>
</html>