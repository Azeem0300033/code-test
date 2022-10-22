<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Corbin - Simple Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/toastr/css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.0/sweetalert2.min.css" integrity="sha512-y6TjkITSFkRB9mZmDaJyDOsyHsYvOo3Np3iAKe02HgMDP4L4vbmbhlzNpbbIVC1x+GUUHvepTd1BKDe4kC6kNg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- make slot to link custom style and css --}}
    {{ $innerCss ?? '' }}
</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="spinner">
        <div class="spinner-a"></div>
        <div class="spinner-b"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{ route('dashboard') }}" class="brand-logo">
            <span class="logo-abbr">Q</span>
            <span class="logo-compact">Corbin</span>
            <span class="brand-title">Corbin</span>
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <x-include.header/>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <x-include.side-bar/>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container">
            {{-- body contet using laravel slots --}}
            {{ $slot }}

        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <x-include.footer/>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/quixnav/quixnav.min.js') }}"></script>
<script src="{{ asset('js/quixnav-init.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.0/sweetalert2.min.js" integrity="sha512-STirfWdXti4sBdx8qNLvlPU6G008ynF4TcZkLd0hOsM6PkZM3PbWbAoe4tO0nAu92S/HfE/XK1N4SwDzai9xDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- this custom file is use to wirte custom JS and AJAX --}}
<script src="{{ asset('js/custom-ajax.js') }}"></script>
{{-- make slot to link custom src and script links --}}
{{ $innerScript ?? '' }}
</body>
</html>
