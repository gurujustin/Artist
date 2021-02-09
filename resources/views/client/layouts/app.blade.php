<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>.: TOP MUSIC EVENTS :. @yield('title')</title>

    @yield('styles')
    <link href="{{asset('adminn/assets/plugins/jquery-notifications/css/messenger.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{asset('adminn/assets/plugins/jquery-notifications/css/messenger-theme-flat.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="{{asset('adminn/assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{asset('adminn/assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{asset('adminn/assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/plugins/bootstrap-datepicker/css/datepicker.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('adminn/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{asset('adminn/assets/plugins/jquery-morris-chart/css/morris.css')}}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{asset('adminn/assets/plugins/jquery-slider/css/jquery.sidr.light.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{asset('adminn/assets/plugins/bootstrap-select2/select2.css')}}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{asset('adminn/assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{asset('adminn/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css')}}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{asset('adminn/assets/plugins/data-tables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/plugins/data-tables/datatables.bootstrap.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminn/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWsORK -->
    <link href="{{asset('adminn/assets/plugins/boostrapv3/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/plugins/boostrapv3/css/bootstrap-theme.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('adminn/assets/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('adminn/assets/css/animate.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="{{asset('adminn/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/css/custom-icon-set.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminn/assets/css/custom-style.css')}}" rel="stylesheet" type="text/css" />
    <style>
        table {
            width: 100% !important;
            border-bottom: 1px solid #ddd !important;
        }

        td .btn-group {
            display: inline-flex;
        }
    </style>
    <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="">
    <!-- BEGIN HEADER -->
    @include('client.layouts.header');
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row">
        <!-- BEGIN SIDEBAR -->
        @include('client.layouts.sidebar');
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE CONTAINER-->
        @yield('content');
        <!-- END CONTAINER -->
    </div>
    <!-- BEGIN CORE JS FRAMEWORK-->
    @include('client.layouts.footer')
    @yield('scripts')
    <!-- END CORE TEMPLATE JS -->
    <script src="{{ asset('adminn/assets/js/core.js') }}" type="text/javascript"></script>
</body>

</html>