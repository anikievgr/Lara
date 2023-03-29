<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Analytics Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <link href="{{asset('style/pageAdmin/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('style/pageAdmin/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('style/pageAdmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('style/pageAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style/pageAdmin/assets/css/components/custom-counter.css')}}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    @section('headerAddLink')
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @show
    <link href="{{asset('style/css/mainLog.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

@include('../adminPanel/navBar')
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
@include('../adminPanel/sydebar')


    <!--  END SIDEBAR  -->
    <div id="content" class="main-content" >

            @yield('content')

    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->


            <script src="{{asset('style/pageAdmin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
            <script src="{{asset('style/pageAdmin/bootstrap/js/popper.min.js')}}"></script>
            <script src="{{asset('style/pageAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('style/pageAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
            <script src="{{asset('style/pageAdmin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
            <script src="{{asset('style/pageAdmin/assets/js/app.js')}}"></script>

            <script>
                $(document).ready(function() {
                    App.init();
                });
            </script>
            <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
            <script src="{{asset('style/pageAdmin/assets/js/custom.js')}}"></script>
            <!-- END GLOBAL MANDATORY STYLES -->

            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
            <script src="{{asset('style/pageAdmin/plugins/counter/jquery.countTo.js')}}"></script>
            <script src="{{asset('style/js/menu.js')}}"></script>
            <!-- END GLOBAL MANDATORY SCRIPTS -->

            <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

            @section('scriptAdd')

            @show

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        </body>
</html>
