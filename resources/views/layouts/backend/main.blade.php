<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title' , 'MyBlog')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-2.4.15/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-2.4.15/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-2.4.15/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-2.4.15/dist/css/skins/skin-blue.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/backend.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Page Header -->
        @include('layouts.backend.navbar')

        <!-- Page Sidebar -->
        @include('layouts.backend.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>


    <!-- jQuery 3 -->
    <script src="{{asset('plugins/AdminLTE-2.4.15/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('plugins/AdminLTE-2.4.15/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('plugins/AdminLTE-2.4.15/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('/plugins/ckeditor/ckeditor.js')}}"></script>
     <script src="{{asset('/plugins/ckeditor/config.js')}}"></script>
    <script src="{{asset('/js/backend.js')}}"></script>
    @yield('script')

</body>

</html>
